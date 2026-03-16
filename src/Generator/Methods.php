<?php

namespace Al3x5\xBot\Devkit\Generator;

use Al3x5\xBot\Devkit\TypeResolver;

/**
 * crea trait con todos los metodos 
 */
class Methods implements GeneratorInterface
{
    public const NAMESPACES = [
        'use Al3x5\xBot\Telegram\ApiClient;',
        'use Al3x5\xBot\Telegram\Entities\InputFile;',
        'use Al3x5\xBot\Telegram\Entities\MessageEntity;',
        'use Al3x5\xBot\Telegram\Entities\LinkPreviewOptions;',
        'use Al3x5\xBot\Telegram\Entities\SuggestedPostParameters;',
        'use Al3x5\xBot\Telegram\Entities\ReplyParameters;',
        'use Al3x5\xBot\Telegram\Entities\InlineKeyboardMarkup;',
        'use Al3x5\xBot\Telegram\Entities\ReplyKeyboardMarkup;',
        'use Al3x5\xBot\Telegram\Entities\ReplyKeyboardRemove;',
        'use Al3x5\xBot\Telegram\Entities\ForceReply;',
        'use Al3x5\xBot\Telegram\Entities\InputPaidMedia;',
        'use Al3x5\xBot\Telegram\Entities\InputMediaAudio;',
        'use Al3x5\xBot\Telegram\Entities\InputMediaDocument;',
        'use Al3x5\xBot\Telegram\Entities\InputMediaPhoto;',
        'use Al3x5\xBot\Telegram\Entities\InputMediaVideo;',
        'use Al3x5\xBot\Telegram\Entities\InputPollOption;',
        'use Al3x5\xBot\Telegram\Entities\InputChecklist;',
        'use Al3x5\xBot\Telegram\Entities\ReactionType;',
        'use Al3x5\xBot\Telegram\Entities\ChatPermissions;',
        'use Al3x5\xBot\Telegram\Entities\BotCommand;',
        'use Al3x5\xBot\Telegram\Entities\BotCommandScope;',
        'use Al3x5\xBot\Telegram\Entities\InputProfilePhoto;',
        'use Al3x5\xBot\Telegram\Entities\MenuButton;',
        'use Al3x5\xBot\Telegram\Entities\ChatAdministratorRights;',
        'use Al3x5\xBot\Telegram\Entities\AcceptedGiftTypes;',
        'use Al3x5\xBot\Telegram\Entities\InputStoryContent;',
        'use Al3x5\xBot\Telegram\Entities\StoryArea;',
        'use Al3x5\xBot\Telegram\Entities\InputMedia;',
        'use Al3x5\xBot\Telegram\Entities\InputSticker;',
        'use Al3x5\xBot\Telegram\Entities\MaskPosition;',
        'use Al3x5\xBot\Telegram\Entities\InlineQueryResult;',
        'use Al3x5\xBot\Telegram\Entities\InlineQueryResultsButton;',
        'use Al3x5\xBot\Telegram\Entities\LabeledPrice;',
        'use Al3x5\xBot\Telegram\Entities\ShippingOption;',
        'use Al3x5\xBot\Telegram\Entities\PassportElementError;',
        'use Al3x5\xBot\Telegram\Entities\Story;',
    ];

    public static function generate(array $methods): void
    {
        $outputDir = getcwd() . '/src/Telegram/';
        $file = $outputDir . 'Methods.php';
        $content = '';

        // Crear directorio si no existe
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $useClass = implode("\n", self::NAMESPACES);

        // crea encabezado
        $content .= <<<PHP
        <?php

        namespace Al3x5\\xBot\Telegram;

        $useClass

        trait Methods
        {
            public function sender(string \$method, array \$args=[]): mixed
            {
                \$api = new ApiClient(\$method, \$args);
                return \$api->send();
            }

        PHP;

        // Procesar todos los tipos definidos
        foreach ($methods as $name => $data) {
            $parameters = $data['parameters'] ?? [];
            $returns = $data['returns'];

            $args = self::getProperties($parameters);
            $docBlock = self::buildDocBlock($data['description'], $parameters, $returns);
            $return = TypeResolver::getReturnType($returns);

            $content .= <<<PHP

                $docBlock
                public function $name($args): $return
                {
                    \$args = get_defined_vars();
                    unset(\$args['this']);
                    return \$this->sender(__FUNCTION__, \$args);
                }
            
            PHP;
        }

        $content .= <<<PHP
        }
        PHP;
        file_put_contents($file, $content);
    }

    private static function getProperties(array $parameters): string
    {
        $required = [];
        $optional = [];

        foreach ($parameters as $key => $value) {
            $type = TypeResolver::getPhpTypeHint($value['type']);

            if ($value['required']) {
                $required[] = "$type \$$key";
            } else {
                if (str_contains($type, '|')) {
                    $optional[] = "$type|null \$$key = null";
                } else {
                    $optional[] = "?$type \$$key = null";
                }
            }
        }

        return implode(', ', array_merge($required, $optional));
    }

    private static function buildDocBlock(array $description, array $parameters, array $returns): string
    {
        $desc = implode("\n     * ", $description);
        $returnType = TypeResolver::getPhpType($returns);
        $returnType = TypeResolver::formatPhpDocType($returnType);

        $doc = "/**\n";
        $doc .= "     * $desc\n";

        foreach ($parameters as $key => $value) {

            $type = TypeResolver::getPhpType($value['type']);
            $docType = TypeResolver::formatPhpDocType($type);
            $return = TypeResolver::getPhpType($returns);

            $doc .= "     * @param $docType \$$key\n";
        }

        $doc .= "     * @return $returnType\n";
        $doc .= "     */";

        return $doc;
    }
}
