<?php

namespace Al3x5\xBot\Devkit;

/**
 * Generator class
 */
class Generator
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

    public static function init(): void
    {
        $data = json_decode(
            file_get_contents(dirname(__DIR__, 4) . '/api.json'),
            true
        );

        self::process($data['types']);
    }

    public static function process(array $types = []): void
    {
        $outputDir = dirname(__DIR__, 4) . '/src/Entities/';

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
            //Subentidades
            if (isset($typeData['subtypes'])) {
                $subtypes = SubType::from($name);
                $addMethod = $subtypes->resolveMethod();
            }

            //Entidades con metodos custom
            if (in_array($name,self::custom)) {
                $addMethod = self::{$name}();
            }

            $classContent = self::makeClass($name, $typeData, $addMethod);
            file_put_contents($outputDir . $name . '.php', $classContent);
        }
    }

    public static function makeClass(
        string $className,
        array $typeData,
        ?string $addMethod = null
    ): string {
        $properties = [];
        $entityMap = [];

        foreach ($typeData['fields'] ?? [] as $field => $value) {
            $fieldName = $field;
            $fieldTypes = $value['type'];
            $phpType = self::getPhpType($fieldTypes/*, $fieldName*/);

            // Solo mapear si es una entidad
            if (self::isEntityType($phpType)) {
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

            $properties[] = "@property " . self::formatPhpDocType($phpType) . " \$$fieldName";
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

        if (!is_null($addMethod)) {
            $addMethod = "\n\n    $addMethod";
        }

        return <<<PHP
<?php

namespace Al3x5\\xBot\Entities;

use Al3x5\\xBot\Telegram\Entity;

$docBlock
class $className extends Entity
{
    protected function setEntities(): array
    {
        $entityMapCode
    }$addMethod
}

PHP;
    }

    private static function Update() : string
    {
        return <<<PHP
    /**
     * Tipo de Actualizacion
     */
    public function type(): ?string
    {
        foreach (\$this->setEntities() as \$key => \$v) {
            if (\$this->hasProperty(\$key)) {
                return \$key;
            }
        }
        return null;
    }
    PHP;
    }

    private static function Message() : string
    {
        return <<<PHP
    public function isCommand(): bool
    {
        if (\$this->hasProperty('entities')) {
            foreach (\$this->entities as \$entity) {
                if (\$entity->type === 'bot_command') {
                    return true;
                }
            }
        }
        return false;
    }
    PHP;
    }

    private static function sanitizeClassName(string $typeName): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $typeName)));
    }

    private static function getPhpType(array $telegramTypes/*, string $fieldName*/): string
    {
        $type = $telegramTypes[0];

        // Mapear tipos básicos
        $typeMap = [
            'String' => 'string',
            'Integer' => 'int',
            'Int' => 'int',
            'Boolean' => 'bool',
            'Float' => 'float',
            'True' => 'bool',
            'Object' => 'object',
        ];

        // Manejar arrays de entidades (Formato: "Array of <Type>")
        if (str_starts_with($type, 'Array<')) {
            $subType = trim(str_replace('Array<', '', $type), '>');

            if (!key_exists($subType, $typeMap)) {
                $sanitized = self::sanitizeClassName($subType);
                return "array<$sanitized>";
            } else {
                return $typeMap[$subType];
            }
        }

        return $typeMap[$type] ?? self::sanitizeClassName($type);
    }

    private static function isEntityType(string $type): bool
    {
        // Tipos que NO son entidades
        $basicTypes = [
            'string',
            'int',
            'bool',
            'float',
            'array',
            'object',
            'mixed',
            'callable',
            'iterable',
            'resource'
        ];

        // Es entidad si:
        // 1. No es un tipo básico
        // 2. No es un array de tipos básicos (array<string>, array<int>, etc.)
        if (preg_match('/^array<(.+)>$/', $type, $matches)) {
            return !in_array(strtolower($matches[1]), $basicTypes);
        }

        return !in_array(strtolower($type), $basicTypes);
    }

    private static function formatPhpDocType(string $type): string
    {
        return str_replace(['array<', '>'], ['', '[]'], $type);
    }
}
