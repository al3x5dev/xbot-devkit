<?php

namespace Mk4U\TgApiKit\Generator;

use Mk4U\TgApiKit\TypeResolver;

/**
 * crea trait con todos los metodos 
 */
class Methods implements GeneratorInterface
{
    public const NAMESPACES = [
        'use Mk4U\TGram\Core\ApiClient;',
        'use Mk4U\TGram\Core\Entities\InputFile;',
        'use Mk4U\TGram\Core\Entities\MessageEntity;',
        'use Mk4U\TGram\Core\Entities\LinkPreviewOptions;',
        'use Mk4U\TGram\Core\Entities\SuggestedPostParameters;',
        'use Mk4U\TGram\Core\Entities\ReplyParameters;',
        'use Mk4U\TGram\Core\Entities\InlineKeyboardMarkup;',
        'use Mk4U\TGram\Core\Entities\ReplyKeyboardMarkup;',
        'use Mk4U\TGram\Core\Entities\ReplyKeyboardRemove;',
        'use Mk4U\TGram\Core\Entities\ForceReply;',
        'use Mk4U\TGram\Core\Entities\InputPaidMedia;',
        'use Mk4U\TGram\Core\Entities\InputMediaAudio;',
        'use Mk4U\TGram\Core\Entities\InputMediaDocument;',
        'use Mk4U\TGram\Core\Entities\InputMediaPhoto;',
        'use Mk4U\TGram\Core\Entities\InputMediaVideo;',
        'use Mk4U\TGram\Core\Entities\InputPollOption;',
        'use Mk4U\TGram\Core\Entities\InputChecklist;',
        'use Mk4U\TGram\Core\Entities\ReactionType;',
        'use Mk4U\TGram\Core\Entities\ChatPermissions;',
        'use Mk4U\TGram\Core\Entities\BotCommand;',
        'use Mk4U\TGram\Core\Entities\BotCommandScope;',
        'use Mk4U\TGram\Core\Entities\InputProfilePhoto;',
        'use Mk4U\TGram\Core\Entities\MenuButton;',
        'use Mk4U\TGram\Core\Entities\ChatAdministratorRights;',
        'use Mk4U\TGram\Core\Entities\AcceptedGiftTypes;',
        'use Mk4U\TGram\Core\Entities\BotAccessSettings;',
        'use Mk4U\TGram\Core\Entities\InputStoryContent;',
        'use Mk4U\TGram\Core\Entities\StoryArea;',
        'use Mk4U\TGram\Core\Entities\InputMedia;',
        'use Mk4U\TGram\Core\Entities\InputSticker;',
        'use Mk4U\TGram\Core\Entities\MaskPosition;',
        'use Mk4U\TGram\Core\Entities\InlineQueryResult;',
        'use Mk4U\TGram\Core\Entities\InlineQueryResultsButton;',
        'use Mk4U\TGram\Core\Entities\LabeledPrice;',
        'use Mk4U\TGram\Core\Entities\ShippingOption;',
        'use Mk4U\TGram\Core\Entities\PassportElementError;',
        'use Mk4U\TGram\Core\Entities\Story;',
        'use Mk4U\TGram\Core\Entities\Message;',
        'use Mk4U\TGram\Core\Entities\MessageId;',
        'use Mk4U\TGram\Core\Entities\WebhookInfo;',
        'use Mk4U\TGram\Core\Entities\User;',
        'use Mk4U\TGram\Core\Entities\UserProfilePhotos;',
        'use Mk4U\TGram\Core\Entities\File;',
        'use Mk4U\TGram\Core\Entities\ChatInviteLink;',
        'use Mk4U\TGram\Core\Entities\ChatFullInfo;',
        'use Mk4U\TGram\Core\Entities\ChatMember;',
        'use Mk4U\TGram\Core\Entities\ForumTopic;',
        'use Mk4U\TGram\Core\Entities\UserChatBoosts;',
        'use Mk4U\TGram\Core\Entities\BusinessConnection;',
        'use Mk4U\TGram\Core\Entities\BotName;',
        'use Mk4U\TGram\Core\Entities\BotDescription;',
        'use Mk4U\TGram\Core\Entities\BotShortDescription;',
        'use Mk4U\TGram\Core\Entities\InputPollMedia;',
        'use Mk4U\TGram\Core\Entities\InputRichMessage;',
        'use Mk4U\TGram\Core\Entities\KeyboardButton;',
        'use Mk4U\TGram\Core\Entities\StarAmount;',
        'use Mk4U\TGram\Core\Entities\Poll;',
        'use Mk4U\TGram\Core\Entities\StickerSet;',
        'use Mk4U\TGram\Core\Entities\PreparedInlineMessage;',
        'use Mk4U\TGram\Core\Entities\PreparedKeyboardButton;',
        'use Mk4U\TGram\Core\Entities\SentGuestMessage;',
        'use Mk4U\TGram\Core\Entities\UserProfileAudios;',
        'use Mk4U\TGram\Core\Entities\SentWebAppMessage;',
        'use Mk4U\TGram\Core\Entities\StarTransactions;',
    ];

    public static function generate(array $methods): void
    {
        $outputDir = getcwd() . '/src/Core/';
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

        namespace Mk4U\\TGram\\Core;

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
