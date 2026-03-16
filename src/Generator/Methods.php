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
        'use Al3x5\xBot\Telegram\Entities\Message;',
        'use Al3x5\xBot\Telegram\Entities\MessageId;',
        'use Al3x5\xBot\Telegram\Entities\WebhookInfo;',
        'use Al3x5\xBot\Telegram\Entities\User;',
        'use Al3x5\xBot\Telegram\Entities\UserProfilePhotos;',
        'use Al3x5\xBot\Telegram\Entities\File;',
        'use Al3x5\xBot\Telegram\Entities\ChatInviteLink;',
        'use Al3x5\xBot\Telegram\Entities\ChatFullInfo;',
        'use Al3x5\xBot\Telegram\Entities\ChatMember;',
        'use Al3x5\xBot\Telegram\Entities\ForumTopic;',
        'use Al3x5\xBot\Telegram\Entities\UserChatBoosts;',
        'use Al3x5\xBot\Telegram\Entities\BusinessConnection;',
        'use Al3x5\xBot\Telegram\Entities\BotName;',
        'use Al3x5\xBot\Telegram\Entities\BotDescription;',
        'use Al3x5\xBot\Telegram\Entities\BotShortDescription;',
        'use Al3x5\xBot\Telegram\Entities\StarAmount;',
        'use Al3x5\xBot\Telegram\Entities\Poll;',
        'use Al3x5\xBot\Telegram\Entities\StickerSet;',
        'use Al3x5\xBot\Telegram\Entities\PreparedInlineMessage;',
        'use Al3x5\xBot\Telegram\Entities\UserProfileAudios;',
        'use Al3x5\xBot\Telegram\Entities\SentWebAppMessage;',
        'use Al3x5\xBot\Telegram\Entities\StarTransactions;',
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
            $docBlock = self::buildDocBlock(
                $name,
                $data['description'],
                $parameters,
                $returns
            );
            $return = TypeResolver::getReturnType($returns);

            if ($name == 'getBusinessAccountStarBalance') {
                $return = 'StarAmount';
            }

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

    private static function buildDocBlock(string $name, array $description, array $parameters, array $returns): string
    {
        $desc = implode("\n     * ", $description);
        $returnType = TypeResolver::getPhpType($returns);
        $returnType = TypeResolver::formatPhpDocType($returnType);

        $doc = "/**\n";
        $doc .= "     * $desc\n";

        foreach ($parameters as $key => $value) {

            $type = TypeResolver::getPhpType($value['type']);
            $docType = TypeResolver::formatPhpDocType($type);

            if ($name == 'getBusinessAccountStarBalance') {
                $returnType = 'StarAmount';
            }

            $doc .= "     * @param $docType \$$key\n";
        }

        $doc .= "     * @return $returnType\n";
        $doc .= "     */";

        return $doc;
    }
}
