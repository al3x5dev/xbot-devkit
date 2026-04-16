<?php

namespace Al3x5\xBot\Devkit\Generator;

use Al3x5\xBot\Devkit\SubType;
use Al3x5\xBot\Devkit\TypeResolver;

/**
 * crea entidades class
 */
class Entities implements GeneratorInterface
{
    //Entidades que no tienen proiedades ni subentidades
    public const serviceMessages = [
        'ForumTopicClosed',
        'ForumTopicReopened',
        'GeneralForumTopicHidden',
        'GeneralForumTopicUnhidden',
        'VideoChatStarted',
        'CallbackGame',
        'InputFile',
    ];

    public const custom = ['Update', 'Message'];

    public static function generate(array $types): void
    {
        $outputDir = getcwd() . '/src/Telegram/Entities/';

        // Crear directorio si no existe
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        // Procesar todos los tipos definidos
        foreach ($types as $name => $typeData) {

            // Si es un mensaje de servicio, forzar campos vacíos sin advertencia
            if (in_array($name, self::serviceMessages)) {
                $typeData['fields'] = [];
            }

            $addMethod = null;
            $constants = null;
            $factory = null;

            //Subentidades
            if (isset($typeData['subtypes'])) {
                $subtypes = SubType::from($name);
                $addMethod = $subtypes->resolveMethod();
                $constants = $subtypes->constants();
                $factory = $subtypes->factoryMethod();
            }

            //Entidades con metodos custom
            if (in_array($name, self::custom)) {
                $addMethod = self::{$name}();
            }

            $classContent = self::makeClass($name, $typeData, $addMethod, $constants, $factory);
            file_put_contents($outputDir . $name . '.php', $classContent);
        }
    }

    public static function makeClass(
        string $className,
        array $typeData,
        ?string $addMethod = null,
        ?string $constants = null,
        ?string $factory = null
    ): string {
        $properties = [];
        $entityMap = [];

        foreach ($typeData['fields'] ?? [] as $field => $value) {
            $fieldName = $field;
            $fieldTypes = $value['type'];
            $phpType = TypeResolver::getPhpType($fieldTypes);

            // Solo mapear si es una entidad
            if (TypeResolver::isEntityType($phpType)) {
                // Manejar arrays de entidades
                if (str_starts_with($phpType, 'array<')) {
                    $entityClass = str_replace(['array<', '>'], '', $phpType);
                    $entityMap[$fieldName] = "[$entityClass::class]";
                }
                // Manejar entidades individuales
                else {
                    $entityMap[$fieldName] = "$phpType::class";
                }
            }

            $properties[] = "@property " . TypeResolver::formatPhpDocType($phpType) . " \$$fieldName";
        }

        $docBlock = "/**\n * $className Entity\n";
        foreach ($properties as $prop) {
            $docBlock .= " * $prop\n";
        }
        $docBlock .= " */";

        // Construir el código del entity map
        $entityMapCode = empty($entityMap) ? 'return [];' : "return [\n";
        foreach ($entityMap as $prop => $classRef) {
            $entityMapCode .= "            '$prop' => $classRef,\n";
        }
        if (!empty($entityMap)) {
            $entityMapCode .= "        ];";
        }

        $methods = '';
        if (!is_null($addMethod)) {
            $methods .= "\n    " . trim($addMethod) . "\n";
        }
        if (!is_null($factory)) {
            $methods .= "\n    " . trim($factory) . "\n";
        }
        $const = (!is_null($constants))? $constants . "\n": "";

        return sprintf('<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

%s
class %s extends Entity
{
    %s
    protected function setEntities(): array
    {
        %s
    }%s
}
',
            $docBlock,
            $className,
            $const,
            $entityMapCode,
            $methods
        );
    }

    private static function Update(): string
    {
        return <<<'PHP'
    /**
     * Tipo de Actualizacion
     */
    public function type(): ?string
    {
        foreach ($this->setEntities() as $key => $v) {
            if ($this->hasProperty($key)) {
                return $key;
            }
        }
        return null;
    }
PHP;
    }

    private static function Message(): string
    {
        return <<<'PHP'
    public function isCommand(): bool
    {
        if ($this->hasProperty('entities')) {
            foreach ($this->entities as $entity) {
                if ($entity->type === 'bot_command') {
                    return true;
                }
            }
        }
        return false;
    }
PHP;
    }
}