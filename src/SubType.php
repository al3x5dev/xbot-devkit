<?php

namespace Al3x5\xBot\Devkit;

enum SubType: string
{
    case MaybeInaccessibleMessage = 'MaybeInaccessibleMessage';
    case MessageOrigin = 'MessageOrigin';
    case PaidMedia = 'PaidMedia';
    case BackgroundFill = 'BackgroundFill';
    case BackgroundType = 'BackgroundType';
    case ChatMember = 'ChatMember';
    case StoryAreaType = 'StoryAreaType';
    case ReactionType = 'ReactionType';
    case OwnedGift = 'OwnedGift';
    case BotCommandScope = 'BotCommandScope';
    case MenuButton = 'MenuButton';
    case ChatBoostSource = 'ChatBoostSource';
    case InputMedia = 'InputMedia';
    case InputPaidMedia = 'InputPaidMedia';
    case InputProfilePhoto = 'InputProfilePhoto';
    case InputStoryContent = 'InputStoryContent';
    case InlineQueryResult = 'InlineQueryResult';
    case InputMessageContent = 'InputMessageContent';
    case RevenueWithdrawalState = 'RevenueWithdrawalState';
    case TransactionPartner = 'TransactionPartner';
    case PassportElementError = 'PassportElementError';
    case InputPollMedia = 'InputPollMedia';
    case InputPollOptionMedia = 'InputPollOptionMedia';
    case InputRichBlock = 'InputRichBlock';
    case RichBlock = 'RichBlock';
    case RichText = 'RichText';

    public function resolveMethod(): string
    {
        return match ($this) {
            self::MaybeInaccessibleMessage => $this->resolveMaybeInaccessibleMessage(),
            self::MessageOrigin => $this->resolveMessageOrigin(),
            self::PaidMedia => $this->resolvePaidMedia(),
            self::BackgroundFill => $this->resolveBackgroundFill(),
            self::BackgroundType => $this->resolveBackgroundType(),
            self::ChatMember => $this->resolveChatMember(),
            self::StoryAreaType => $this->resolveStoryAreaType(),
            self::ReactionType => $this->resolveReactionType(),
            self::OwnedGift => $this->resolveOwnedGift(),
            self::BotCommandScope => $this->resolveBotCommandScope(),
            self::MenuButton => $this->resolveMenuButton(),
            self::ChatBoostSource => $this->resolveChatBoostSource(),
            self::InputMedia => $this->resolveInputMedia(),
            self::InputPaidMedia => $this->resolveInputPaidMedia(),
            self::InputProfilePhoto => $this->resolveInputProfilePhoto(),
            self::InputStoryContent => $this->resolveInputStoryContent(),
            self::InlineQueryResult => $this->resolveInlineQueryResult(),
            self::InputMessageContent => $this->resolveInputMessageContent(),
            self::RevenueWithdrawalState => $this->resolveRevenueWithdrawalState(),
            self::TransactionPartner => $this->resolveTransactionPartner(),
            self::PassportElementError => $this->resolvePassportElementError(),
            self::InputPollMedia => $this->resolveInputPollMedia(),
            self::InputPollOptionMedia => $this->resolveInputPollOptionMedia(),
            self::InputRichBlock => $this->resolveInputRichBlock(),
            self::RichBlock => $this->resolveRichBlock(),
            self::RichText => $this->resolveRichText(),
        };
    }

    public function factoryMethod(): string
    {
        return match ($this) {
            self::MaybeInaccessibleMessage => $this->factoryMaybeInaccessibleMessage(),
            self::MessageOrigin => $this->factoryMessageOrigin(),
            self::PaidMedia => $this->factoryPaidMedia(),
            self::BackgroundFill => $this->factoryBackgroundFill(),
            self::BackgroundType => $this->factoryBackgroundType(),
            self::ChatMember => $this->factoryChatMember(),
            self::StoryAreaType => $this->factoryStoryAreaType(),
            self::ReactionType => $this->factoryReactionType(),
            self::OwnedGift => $this->factoryOwnedGift(),
            self::BotCommandScope => $this->factoryBotCommandScope(),
            self::MenuButton => $this->factoryMenuButton(),
            self::ChatBoostSource => $this->factoryChatBoostSource(),
            self::InputMedia => $this->factoryInputMedia(),
            self::InputPaidMedia => $this->factoryInputPaidMedia(),
            self::InputProfilePhoto => $this->factoryInputProfilePhoto(),
            self::InputStoryContent => $this->factoryInputStoryContent(),
            self::InlineQueryResult => $this->factoryInlineQueryResult(),
            self::InputMessageContent => $this->factoryInputMessageContent(),
            self::RevenueWithdrawalState => $this->factoryRevenueWithdrawalState(),
            self::TransactionPartner => $this->factoryTransactionPartner(),
            self::PassportElementError => $this->factoryPassportElementError(),
            self::InputPollMedia => $this->factoryInputPollMedia(),
            self::InputPollOptionMedia => $this->factoryInputPollOptionMedia(),
            self::InputRichBlock => $this->factoryInputRichBlock(),
            self::RichBlock => $this->factoryRichBlock(),
            self::RichText => $this->factoryRichText(),
        };
    }

    public function constants(): string
    {
        return match ($this) {
            self::MaybeInaccessibleMessage => $this->constMaybeInaccessibleMessage(),
            self::MessageOrigin => $this->constMessageOrigin(),
            self::PaidMedia => $this->constPaidMedia(),
            self::BackgroundFill => $this->constBackgroundFill(),
            self::BackgroundType => $this->constBackgroundType(),
            self::ChatMember => $this->constChatMember(),
            self::StoryAreaType => $this->constStoryAreaType(),
            self::ReactionType => $this->constReactionType(),
            self::OwnedGift => $this->constOwnedGift(),
            self::BotCommandScope => $this->constBotCommandScope(),
            self::MenuButton => $this->constMenuButton(),
            self::ChatBoostSource => $this->constChatBoostSource(),
            self::InputMedia => $this->constInputMedia(),
            self::InputPaidMedia => $this->constInputPaidMedia(),
            self::InputProfilePhoto => $this->constInputProfilePhoto(),
            self::InputStoryContent => $this->constInputStoryContent(),
            self::InlineQueryResult => $this->constInlineQueryResult(),
            self::InputMessageContent => $this->constInputMessageContent(),
            self::RevenueWithdrawalState => $this->constRevenueWithdrawalState(),
            self::TransactionPartner => $this->constTransactionPartner(),
            self::PassportElementError => $this->constPassportElementError(),
            self::InputPollMedia => $this->constInputPollMedia(),
            self::InputPollOptionMedia => $this->constInputPollOptionMedia(),
            self::InputRichBlock => $this->constInputRichBlock(),
            self::RichBlock => $this->constRichBlock(),
            self::RichText => $this->constRichText(),
        };
    }

    private function constMaybeInaccessibleMessage(): string
    {
        return "
    public const TYPE_MESSAGE = 'message';
    public const TYPE_INACCESSIBLE_MESSAGE = 'inaccessible_message';";
    }

    private function constMessageOrigin(): string
    {
        return "
    public const TYPE_USER = 'user';
    public const TYPE_HIDDEN_USER = 'hidden_user';
    public const TYPE_CHAT = 'chat';
    public const TYPE_CHANNEL = 'channel';";
    }

    private function constPaidMedia(): string
    {
        return "
    public const TYPE_PREVIEW = 'preview';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';";
    }

    private function constBackgroundFill(): string
    {
        return "
    public const TYPE_SOLID = 'solid';
    public const TYPE_GRADIENT = 'gradient';
    public const TYPE_FREEFORM_GRADIENT = 'freeform_gradient';";
    }

    private function constBackgroundType(): string
    {
        return "
    public const TYPE_FILL = 'fill';
    public const TYPE_WALLPAPER = 'wallpaper';
    public const TYPE_PATTERN = 'pattern';
    public const TYPE_CHAT_THEME = 'chat_theme';";
    }

    private function constChatMember(): string
    {
        return "
    public const STATUS_CREATOR = 'creator';
    public const STATUS_ADMINISTRATOR = 'administrator';
    public const STATUS_MEMBER = 'member';
    public const STATUS_RESTRICTED = 'restricted';
    public const STATUS_LEFT = 'left';
    public const STATUS_KICKED = 'kicked';";
    }

    private function constStoryAreaType(): string
    {
        return "
    public const TYPE_LOCATION = 'location';
    public const TYPE_SUGGESTED_REACTION = 'suggested_reaction';
    public const TYPE_LINK = 'link';
    public const TYPE_WEATHER = 'weather';
    public const TYPE_UNIQUE_GIFT = 'unique_gift';";
    }

    private function constReactionType(): string
    {
        return "
    public const TYPE_EMOJI = 'emoji';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';
    public const TYPE_PAID = 'paid';";
    }

    private function constOwnedGift(): string
    {
        return "
    public const TYPE_REGULAR = 'regular';
    public const TYPE_UNIQUE = 'unique';";
    }

    private function constBotCommandScope(): string
    {
        return "
    public const TYPE_DEFAULT = 'default';
    public const TYPE_ALL_PRIVATE_CHATS = 'all_private_chats';
    public const TYPE_ALL_GROUP_CHATS = 'all_group_chats';
    public const TYPE_ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';
    public const TYPE_CHAT = 'chat';
    public const TYPE_CHAT_ADMINISTRATORS = 'chat_administrators';
    public const TYPE_CHAT_MEMBER = 'chat_member';";
    }

    private function constMenuButton(): string
    {
        return "
    public const TYPE_COMMANDS = 'commands';
    public const TYPE_WEB_APP = 'web_app';
    public const TYPE_DEFAULT = 'default';";
    }

    private function constChatBoostSource(): string
    {
        return "
    public const SOURCE_PREMIUM = 'premium';
    public const SOURCE_GIFT_CODE = 'gift_code';
    public const SOURCE_GIVEAWAY = 'giveaway';";
    }

    private function constInputMedia(): string
    {
        return "
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_AUDIO = 'audio';";
    }

    private function constInputPaidMedia(): string
    {
        return "
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';";
    }

    private function constInputProfilePhoto(): string
    {
        return "
    public const TYPE_STATIC = 'static';
    public const TYPE_ANIMATED = 'animated';";
    }

    private function constInputStoryContent(): string
    {
        return "
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';";
    }

    private function constInlineQueryResult(): string
    {
        return "
    public const TYPE_ARTICLE = 'article';
    public const TYPE_LOCATION = 'location';
    public const TYPE_VENUE = 'venue';
    public const TYPE_CONTACT = 'contact';
    public const TYPE_GAME = 'game';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_GIF = 'gif';
    public const TYPE_MPEG4_GIF = 'mpeg4_gif';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VOICE = 'voice';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_STICKER = 'sticker';";
    }

    private function constInputMessageContent(): string
    {
        return "";
    }

    private function constRevenueWithdrawalState(): string
    {
        return "
    public const TYPE_PENDING = 'pending';
    public const TYPE_SUCCEEDED = 'succeeded';
    public const TYPE_FAILED = 'failed';";
    }

    private function constTransactionPartner(): string
    {
        return "
    public const TYPE_USER = 'user';
    public const TYPE_CHAT = 'chat';
    public const TYPE_AFFILIATE_PROGRAM = 'affiliate_program';
    public const TYPE_FRAGMENT = 'fragment';
    public const TYPE_TELEGRAM_ADS = 'telegram_ads';
    public const TYPE_TELEGRAM_API = 'telegram_api';
    public const TYPE_OTHER = 'other';";
    }

    private function constPassportElementError(): string
    {
        return "
    public const SOURCE_DATA = 'data';
    public const SOURCE_FRONT_SIDE = 'front_side';
    public const SOURCE_REVERSE_SIDE = 'reverse_side';
    public const SOURCE_SELFIE = 'selfie';
    public const SOURCE_FILE = 'file';
    public const SOURCE_FILES = 'files';
    public const SOURCE_TRANSLATION_FILE = 'translation_file';
    public const SOURCE_TRANSLATION_FILES = 'translation_files';
    public const SOURCE_UNSPECIFIED = 'unspecified';";
    }

    private function constInputPollMedia(): string
    {
        return "
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_DOCUMENT = 'document';
    public const TYPE_LIVE_PHOTO = 'live_photo';
    public const TYPE_LOCATION = 'location';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VENUE = 'venue';
    public const TYPE_VIDEO = 'video';";
    }

    private function constInputPollOptionMedia(): string
    {
        return "
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_LINK = 'link';
    public const TYPE_LIVE_PHOTO = 'live_photo';
    public const TYPE_LOCATION = 'location';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_STICKER = 'sticker';
    public const TYPE_VENUE = 'venue';
    public const TYPE_VIDEO = 'video';";
    }

    private function factoryMaybeInaccessibleMessage(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on data
     *
     * @param array $data
     * @return Entity
     */
    public static function create(array $data): Entity
    {
        return isset($data['from']) 
            ? new Message($data)
            : new InaccessibleMessage($data);
    }
PHP;
    }

    private function factoryMessageOrigin(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_USER => new MessageOriginUser($data),
            self::TYPE_HIDDEN_USER => new MessageOriginHiddenUser($data),
            self::TYPE_CHAT => new MessageOriginChat($data),
            self::TYPE_CHANNEL => new MessageOriginChannel($data),
            default => throw new \InvalidArgumentException('Unknown MessageOrigin type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryChatMember(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on status
     *
     * @param array $data Must contain 'status' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['status'] ?? null) {
            self::STATUS_CREATOR => new ChatMemberOwner($data),
            self::STATUS_ADMINISTRATOR => new ChatMemberAdministrator($data),
            self::STATUS_MEMBER => new ChatMemberMember($data),
            self::STATUS_RESTRICTED => new ChatMemberRestricted($data),
            self::STATUS_LEFT => new ChatMemberLeft($data),
            self::STATUS_KICKED => new ChatMemberBanned($data),
            default => throw new \InvalidArgumentException('Unknown ChatMember status: ' . ($data['status'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryPaidMedia(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PREVIEW => new PaidMediaPreview($data),
            self::TYPE_PHOTO => new PaidMediaPhoto($data),
            self::TYPE_VIDEO => new PaidMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown PaidMedia type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryBackgroundFill(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_SOLID => new BackgroundFillSolid($data),
            self::TYPE_GRADIENT => new BackgroundFillGradient($data),
            self::TYPE_FREEFORM_GRADIENT => new BackgroundFillFreeformGradient($data),
            default => throw new \InvalidArgumentException('Unknown BackgroundFill type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryBackgroundType(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_FILL => new BackgroundTypeFill($data),
            self::TYPE_WALLPAPER => new BackgroundTypeWallpaper($data),
            self::TYPE_PATTERN => new BackgroundTypePattern($data),
            self::TYPE_CHAT_THEME => new BackgroundTypeChatTheme($data),
            default => throw new \InvalidArgumentException('Unknown BackgroundType type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryStoryAreaType(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_LOCATION => new StoryAreaTypeLocation($data),
            self::TYPE_SUGGESTED_REACTION => new StoryAreaTypeSuggestedReaction($data),
            self::TYPE_LINK => new StoryAreaTypeLink($data),
            self::TYPE_WEATHER => new StoryAreaTypeWeather($data),
            self::TYPE_UNIQUE_GIFT => new StoryAreaTypeUniqueGift($data),
            default => throw new \InvalidArgumentException('Unknown StoryAreaType type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryReactionType(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_EMOJI => new ReactionTypeEmoji($data),
            self::TYPE_CUSTOM_EMOJI => new ReactionTypeCustomEmoji($data),
            self::TYPE_PAID => new ReactionTypePaid($data),
            default => throw new \InvalidArgumentException('Unknown ReactionType type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryOwnedGift(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_REGULAR => new OwnedGiftRegular($data),
            self::TYPE_UNIQUE => new OwnedGiftUnique($data),
            default => throw new \InvalidArgumentException('Unknown OwnedGift type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryBotCommandScope(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_DEFAULT => new BotCommandScopeDefault($data),
            self::TYPE_ALL_PRIVATE_CHATS => new BotCommandScopeAllPrivateChats($data),
            self::TYPE_ALL_GROUP_CHATS => new BotCommandScopeAllGroupChats($data),
            self::TYPE_ALL_CHAT_ADMINISTRATORS => new BotCommandScopeAllChatAdministrators($data),
            self::TYPE_CHAT => new BotCommandScopeChat($data),
            self::TYPE_CHAT_ADMINISTRATORS => new BotCommandScopeChatAdministrators($data),
            self::TYPE_CHAT_MEMBER => new BotCommandScopeChatMember($data),
            default => throw new \InvalidArgumentException('Unknown BotCommandScope type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryMenuButton(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_COMMANDS => new MenuButtonCommands($data),
            self::TYPE_WEB_APP => new MenuButtonWebApp($data),
            self::TYPE_DEFAULT => new MenuButtonDefault($data),
            default => throw new \InvalidArgumentException('Unknown MenuButton type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryChatBoostSource(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on source
     *
     * @param array $data Must contain 'source' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['source'] ?? null) {
            self::SOURCE_PREMIUM => new ChatBoostSourcePremium($data),
            self::SOURCE_GIFT_CODE => new ChatBoostSourceGiftCode($data),
            self::SOURCE_GIVEAWAY => new ChatBoostSourceGiveaway($data),
            default => throw new \InvalidArgumentException('Unknown ChatBoostSource source: ' . ($data['source'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputMedia(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_DOCUMENT => new InputMediaDocument($data),
            self::TYPE_AUDIO => new InputMediaAudio($data),
            default => throw new \InvalidArgumentException('Unknown InputMedia type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputPaidMedia(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PHOTO => new InputPaidMediaPhoto($data),
            self::TYPE_VIDEO => new InputPaidMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPaidMedia type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputProfilePhoto(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_STATIC => new InputProfilePhotoStatic($data),
            self::TYPE_ANIMATED => new InputProfilePhotoAnimated($data),
            default => throw new \InvalidArgumentException('Unknown InputProfilePhoto type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputStoryContent(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PHOTO => new InputStoryContentPhoto($data),
            self::TYPE_VIDEO => new InputStoryContentVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputStoryContent type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInlineQueryResult(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * | type= | Creates |
     * |-------|----------|
     * | article | InlineQueryResultArticle |
     * | location | InlineQueryResultLocation |
     * | venue | InlineQueryResultVenue |
     * | contact | InlineQueryResultContact |
     * | game | InlineQueryResultGame |
     * | photo | InlineQueryResultPhoto or CachedPhoto* |
     * | gif | InlineQueryResultGif or CachedGif* |
     * | document | InlineQueryResultDocument or CachedDocument* |
     * | video | InlineQueryResultVideo or CachedVideo* |
     * | voice | InlineQueryResultVoice or CachedVoice* |
     * | audio | InlineQueryResultAudio or CachedAudio* |
     * | sticker | InlineQueryResultCachedSticker |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        $type = $data['type'] ?? null;
        return match($type) {
            self::TYPE_ARTICLE => new InlineQueryResultArticle($data),
            self::TYPE_LOCATION => new InlineQueryResultLocation($data),
            self::TYPE_VENUE => new InlineQueryResultVenue($data),
            self::TYPE_CONTACT => new InlineQueryResultContact($data),
            self::TYPE_GAME => new InlineQueryResultGame($data),
            self::TYPE_STICKER => new InlineQueryResultCachedSticker($data),
            self::TYPE_PHOTO => isset($data['photo_url'])
                ? new InlineQueryResultPhoto($data)
                : new InlineQueryResultCachedPhoto($data),
            self::TYPE_GIF => isset($data['gif_url'])
                ? new InlineQueryResultGif($data)
                : new InlineQueryResultCachedGif($data),
            self::TYPE_MPEG4_GIF => isset($data['mpeg4_url'])
                ? new InlineQueryResultMpeg4Gif($data)
                : new InlineQueryResultCachedMpeg4Gif($data),
            self::TYPE_DOCUMENT => isset($data['document_url'])
                ? new InlineQueryResultDocument($data)
                : new InlineQueryResultCachedDocument($data),
            self::TYPE_VIDEO => isset($data['video_url'])
                ? new InlineQueryResultVideo($data)
                : new InlineQueryResultCachedVideo($data),
            self::TYPE_VOICE => isset($data['voice_url'])
                ? new InlineQueryResultVoice($data)
                : new InlineQueryResultCachedVoice($data),
            self::TYPE_AUDIO => isset($data['audio_url'])
                ? new InlineQueryResultAudio($data)
                : new InlineQueryResultCachedAudio($data),
            default => throw new \InvalidArgumentException('Unknown InlineQueryResult type: ' . ($type ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputMessageContent(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on data provided
     *
     * @param array $data
     * @return Entity
     * | Key | Creates |
     * |-----|----------|
     * | message_text | InputTextMessageContent |
     * | phone_number | InputContactMessageContent |
     * | payload | InputInvoiceMessageContent |
     * | latitude + longitude + title | InputVenueMessageContent |
     * | latitude + longitude | InputLocationMessageContent |
     * | html / markdown | InputRichMessageContent |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match(true) {
            isset($data['message_text']) => new InputTextMessageContent($data),
            isset($data['phone_number']) => new InputContactMessageContent($data),
            isset($data['payload']) => new InputInvoiceMessageContent($data),
            isset($data['latitude'], $data['longitude'], $data['title']) => new InputVenueMessageContent($data),
            isset($data['latitude'], $data['longitude']) => new InputLocationMessageContent($data),
            isset($data['html']) || isset($data['markdown']) => new InputRichMessageContent($data),
            default => throw new \InvalidArgumentException('Unknown InputMessageContent: no valid property found'),
        };
    }
PHP;
    }

    private function factoryRevenueWithdrawalState(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PENDING => new RevenueWithdrawalStatePending($data),
            self::TYPE_SUCCEEDED => new RevenueWithdrawalStateSucceeded($data),
            self::TYPE_FAILED => new RevenueWithdrawalStateFailed($data),
            default => throw new \InvalidArgumentException('Unknown RevenueWithdrawalState type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryTransactionPartner(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_USER => new TransactionPartnerUser($data),
            self::TYPE_CHAT => new TransactionPartnerChat($data),
            self::TYPE_AFFILIATE_PROGRAM => new TransactionPartnerAffiliateProgram($data),
            self::TYPE_FRAGMENT => new TransactionPartnerFragment($data),
            self::TYPE_TELEGRAM_ADS => new TransactionPartnerTelegramAds($data),
            self::TYPE_TELEGRAM_API => new TransactionPartnerTelegramApi($data),
            self::TYPE_OTHER => new TransactionPartnerOther($data),
            default => throw new \InvalidArgumentException('Unknown TransactionPartner type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryPassportElementError(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on source
     *
     * @param array $data Must contain 'source' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['source'] ?? null) {
            self::SOURCE_DATA => new PassportElementErrorDataField($data),
            self::SOURCE_FRONT_SIDE => new PassportElementErrorFrontSide($data),
            self::SOURCE_REVERSE_SIDE => new PassportElementErrorReverseSide($data),
            self::SOURCE_SELFIE => new PassportElementErrorSelfie($data),
            self::SOURCE_FILE => new PassportElementErrorFile($data),
            self::SOURCE_FILES => new PassportElementErrorFiles($data),
            self::SOURCE_TRANSLATION_FILE => new PassportElementErrorTranslationFile($data),
            self::SOURCE_TRANSLATION_FILES => new PassportElementErrorTranslationFiles($data),
            self::SOURCE_UNSPECIFIED => new PassportElementErrorUnspecified($data),
            default => throw new \InvalidArgumentException('Unknown PassportElementError source: ' . ($data['source'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputPollMedia(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     *
     * | type= | Creates |
     * |-------|----------|
     * | animation | InputMediaAnimation |
     * | audio | InputMediaAudio |
     * | document | InputMediaDocument |
     * | live_photo | InputMediaLivePhoto |
     * | location | InputMediaLocation |
     * | photo | InputMediaPhoto |
     * | venue | InputMediaVenue |
     * | video | InputMediaVideo |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_AUDIO => new InputMediaAudio($data),
            self::TYPE_DOCUMENT => new InputMediaDocument($data),
            self::TYPE_LIVE_PHOTO => new InputMediaLivePhoto($data),
            self::TYPE_LOCATION => new InputMediaLocation($data),
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_VENUE => new InputMediaVenue($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPollMedia type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryInputPollOptionMedia(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     *
     * | type= | Creates |
     * |-------|----------|
     * | animation | InputMediaAnimation |
     * | link | InputMediaLink |
     * | live_photo | InputMediaLivePhoto |
     * | location | InputMediaLocation |
     * | photo | InputMediaPhoto |
     * | sticker | InputMediaSticker |
     * | venue | InputMediaVenue |
     * | video | InputMediaVideo |
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_ANIMATION => new InputMediaAnimation($data),
            self::TYPE_LINK => new InputMediaLink($data),
            self::TYPE_LIVE_PHOTO => new InputMediaLivePhoto($data),
            self::TYPE_LOCATION => new InputMediaLocation($data),
            self::TYPE_PHOTO => new InputMediaPhoto($data),
            self::TYPE_STICKER => new InputMediaSticker($data),
            self::TYPE_VENUE => new InputMediaVenue($data),
            self::TYPE_VIDEO => new InputMediaVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputPollOptionMedia type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function resolveMaybeInaccessibleMessage(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return $this->hasProperty('from') 
            ? new Message($this->properties)
            : new InaccessibleMessage($this->properties);
    }
PHP;
    }

    private function resolveMessageOrigin(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'user' => new MessageOriginUser($this->properties),
            'hidden_user' => new MessageOriginHiddenUser($this->properties),
            'chat' => new MessageOriginChat($this->properties),
            'channel' => new MessageOriginChannel($this->properties),
            default => throw new \InvalidArgumentException('Unknown MessageOrigin type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveChatMember(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->status) {
            'creator' => new ChatMemberOwner($this->properties),
            'administrator' => new ChatMemberAdministrator($this->properties),
            'member' => new ChatMemberMember($this->properties),
            'restricted' => new ChatMemberRestricted($this->properties),
            'left' => new ChatMemberLeft($this->properties),
            'kicked' => new ChatMemberBanned($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatMember status: ' . $this->status),
        };
    }
PHP;
    }

    private function resolvePaidMedia(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type){
            'preview' => new PaidMediaPreview($this->properties),
            'photo' => new PaidMediaPhoto($this->properties),
            'video' => new PaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown PaidMedia type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveBackgroundFill(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'solid' => new BackgroundFillSolid($this->properties),
            'gradient' => new BackgroundFillGradient($this->properties),
            'freeform_gradient' => new BackgroundFillFreeformGradient($this->properties),
            default => throw new \InvalidArgumentException('Unknown BackgroundFill type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveBackgroundType(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'fill' => new BackgroundTypeFill($this->properties),
            'wallpaper' => new BackgroundTypeWallpaper($this->properties),
            'pattern' => new BackgroundTypePattern($this->properties),
            'chat_theme' => new BackgroundTypeChatTheme($this->properties),
            default => throw new \InvalidArgumentException('Unknown BackgroundType type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveStoryAreaType(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'location' => new StoryAreaTypeLocation($this->properties),
            'suggested_reaction' => new StoryAreaTypeSuggestedReaction($this->properties),
            'link' => new StoryAreaTypeLink($this->properties),
            'weather' => new StoryAreaTypeWeather($this->properties),
            'unique_gift' => new StoryAreaTypeUniqueGift($this->properties),
            default => throw new \InvalidArgumentException('Unknown StoryAreaType type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveReactionType(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'emoji' => new ReactionTypeEmoji($this->properties),
            'custom_emoji' => new ReactionTypeCustomEmoji($this->properties),
            'paid' => new ReactionTypePaid($this->properties),
            default => throw new \InvalidArgumentException('Unknown ReactionType type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveOwnedGift(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type){
            'regular' => new OwnedGiftRegular($this->properties),
            'unique' => new OwnedGiftUnique($this->properties),
            default => throw new \InvalidArgumentException('Unknown OwnedGift type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveBotCommandScope(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'default' => new BotCommandScopeDefault($this->properties),
            'all_private_chats' => new BotCommandScopeAllPrivateChats($this->properties),
            'all_group_chats' => new BotCommandScopeAllGroupChats($this->properties),
            'all_chat_administrators' => new BotCommandScopeAllChatAdministrators($this->properties),
            'chat' => new BotCommandScopeChat($this->properties),
            'chat_administrators' => new BotCommandScopeChatAdministrators($this->properties),
            'chat_member' => new BotCommandScopeChatMember($this->properties),
            default => throw new \InvalidArgumentException('Unknown BotCommandScope type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveMenuButton(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'commands' => new MenuButtonCommands($this->properties),
            'web_app' => new MenuButtonWebApp($this->properties),
            'default' => new MenuButtonDefault($this->properties),
            default => throw new \InvalidArgumentException('Unknown MenuButton type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveChatBoostSource(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->source) {
            'premium' => new ChatBoostSourcePremium($this->properties),
            'gift_code' => new ChatBoostSourceGiftCode($this->properties),
            'giveaway' => new ChatBoostSourceGiveaway($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatBoostSource source: ' . $this->source),
        };
    }
PHP;
    }

    private function resolveInputMedia(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputMediaPhoto($this->properties),
            'video' => new InputMediaVideo($this->properties),
            'animation' => new InputMediaAnimation($this->properties),
            'document' => new InputMediaDocument($this->properties),
            'audio' => new InputMediaAudio($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputMedia type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInputPaidMedia(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputPaidMediaPhoto($this->properties),
            'video' => new InputPaidMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPaidMedia type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInputProfilePhoto(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'static' => new InputProfilePhotoStatic($this->properties),
            'animated' => new InputProfilePhotoAnimated($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputProfilePhoto type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInputStoryContent(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputStoryContentPhoto($this->properties),
            'video' => new InputStoryContentVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputStoryContent type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInlineQueryResult(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'article' => new InlineQueryResultArticle($this->properties),
            'location' => new InlineQueryResultLocation($this->properties),
            'venue' => new InlineQueryResultVenue($this->properties),
            'contact' => new InlineQueryResultContact($this->properties),
            'game' => new InlineQueryResultGame($this->properties),
            'sticker' => new InlineQueryResultCachedSticker($this->properties),
            'photo' => $this->hasProperty('photo_url')
                ? new InlineQueryResultPhoto($this->properties)
                : new InlineQueryResultCachedPhoto($this->properties),
            'gif' => $this->hasProperty('gif_url') 
                ? new InlineQueryResultGif($this->properties)
                : new InlineQueryResultCachedGif($this->properties),
            'mpeg4_gif' => $this->hasProperty('mpeg4_url') 
                ? new InlineQueryResultMpeg4Gif($this->properties)
                : new InlineQueryResultCachedMpeg4Gif($this->properties),
            'document' => $this->hasProperty('document_url')
                ? new InlineQueryResultDocument($this->properties)
                : new InlineQueryResultCachedDocument($this->properties),
            'video' => $this->hasProperty('video_url')
                ? new InlineQueryResultVideo($this->properties)
                : new InlineQueryResultCachedVideo($this->properties),
            'voice' => $this->hasProperty('voice_url')
                ? new InlineQueryResultVoice($this->properties)
                : new InlineQueryResultCachedVoice($this->properties),
            'audio' => $this->hasProperty('audio_url')
                ? new InlineQueryResultAudio ($this->properties)
                : new InlineQueryResultCachedAudio($this->properties),
            default => throw new \InvalidArgumentException('Unknown InlineQueryResult type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInputMessageContent(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        if($this->hasProperty('message_text')){
            return new InputTextMessageContent($this->properties);
        }
        if($this->hasProperty('phone_number')){
            return new InputContactMessageContent($this->properties);
        }
        if($this->hasProperty('payload')){
            return new InputInvoiceMessageContent($this->properties);
        }
        if(
            $this->hasProperty('latitude') && 
            $this->hasProperty('longitude') && 
            $this->hasProperty('title')
        ){
            return new InputVenueMessageContent($this->properties);
        }
        if (
            $this->hasProperty('latitude') &&
            $this->hasProperty('longitude')
        ) {
            return new InputLocationMessageContent($this->properties);
        }
        if ($this->hasProperty('html') || $this->hasProperty('markdown')) {
            return new InputRichMessageContent($this->properties);
        }
        throw new \InvalidArgumentException('Unknown InputMessageContent');
    }
PHP;
    }

    private function resolveRevenueWithdrawalState(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'pending' => new RevenueWithdrawalStatePending($this->properties),
            'succeeded' => new RevenueWithdrawalStateSucceeded($this->properties),
            'failed' => new RevenueWithdrawalStateFailed($this->properties),
            default => throw new \InvalidArgumentException('Unknown RevenueWithdrawalState type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveTransactionPartner(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'user' => new TransactionPartnerUser($this->properties),
            'chat' => new TransactionPartnerChat($this->properties),
            'affiliate_program' => new TransactionPartnerAffiliateProgram($this->properties),
            'fragment' => new TransactionPartnerFragment($this->properties),
            'telegram_ads' => new TransactionPartnerTelegramAds($this->properties),
            'telegram_api' => new TransactionPartnerTelegramApi($this->properties),
            'other' => new TransactionPartnerOther($this->properties),
            default => throw new \InvalidArgumentException('Unknown TransactionPartner type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolvePassportElementError(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->source) {
            'data' => new PassportElementErrorDataField($this->properties),
            'front_side' => new PassportElementErrorFrontSide($this->properties),
            'reverse_side' => new PassportElementErrorReverseSide($this->properties),
            'selfie' => new PassportElementErrorSelfie($this->properties),
            'file' => new PassportElementErrorFile($this->properties),
            'files' => new PassportElementErrorFiles($this->properties),
            'translation_file' => new PassportElementErrorTranslationFile($this->properties),
            'translation_files' => new PassportElementErrorTranslationFiles($this->properties),
            'unspecified' => new PassportElementErrorUnspecified($this->properties),
            default => throw new \InvalidArgumentException('Unknown PassportElementError type: ' . $this->source),
        };
    }
PHP;
    }

    private function resolveInputPollMedia(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'animation' => new InputMediaAnimation($this->properties),
            'audio' => new InputMediaAudio($this->properties),
            'document' => new InputMediaDocument($this->properties),
            'live_photo' => new InputMediaLivePhoto($this->properties),
            'location' => new InputMediaLocation($this->properties),
            'photo' => new InputMediaPhoto($this->properties),
            'venue' => new InputMediaVenue($this->properties),
            'video' => new InputMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPollMedia type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveInputPollOptionMedia(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'animation' => new InputMediaAnimation($this->properties),
            'link' => new InputMediaLink($this->properties),
            'live_photo' => new InputMediaLivePhoto($this->properties),
            'location' => new InputMediaLocation($this->properties),
            'photo' => new InputMediaPhoto($this->properties),
            'sticker' => new InputMediaSticker($this->properties),
            'venue' => new InputMediaVenue($this->properties),
            'video' => new InputMediaVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputPollOptionMedia type: ' . $this->type),
        };
    }
PHP;
    }

    private function constInputRichBlock(): string
    {
        return "
    public const TYPE_PARAGRAPH = 'paragraph';
    public const TYPE_SECTION_HEADING = 'section_heading';
    public const TYPE_PREFORMATTED = 'preformatted';
    public const TYPE_FOOTER = 'footer';
    public const TYPE_DIVIDER = 'divider';
    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';
    public const TYPE_ANCHOR = 'anchor';
    public const TYPE_LIST = 'list';
    public const TYPE_BLOCK_QUOTATION = 'block_quotation';
    public const TYPE_PULL_QUOTATION = 'pull_quotation';
    public const TYPE_COLLAGE = 'collage';
    public const TYPE_SLIDESHOW = 'slideshow';
    public const TYPE_TABLE = 'table';
    public const TYPE_DETAILS = 'details';
    public const TYPE_MAP = 'map';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VOICE_NOTE = 'voice_note';
    public const TYPE_THINKING = 'thinking';";
    }

    private function constRichBlock(): string
    {
        return "
    public const TYPE_PARAGRAPH = 'paragraph';
    public const TYPE_SECTION_HEADING = 'section_heading';
    public const TYPE_PREFORMATTED = 'preformatted';
    public const TYPE_FOOTER = 'footer';
    public const TYPE_DIVIDER = 'divider';
    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';
    public const TYPE_ANCHOR = 'anchor';
    public const TYPE_LIST = 'list';
    public const TYPE_BLOCK_QUOTATION = 'block_quotation';
    public const TYPE_PULL_QUOTATION = 'pull_quotation';
    public const TYPE_COLLAGE = 'collage';
    public const TYPE_SLIDESHOW = 'slideshow';
    public const TYPE_TABLE = 'table';
    public const TYPE_DETAILS = 'details';
    public const TYPE_MAP = 'map';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VOICE_NOTE = 'voice_note';
    public const TYPE_THINKING = 'thinking';";
    }

    private function constRichText(): string
    {
        return "
    public const TYPE_BOLD = 'bold';
    public const TYPE_ITALIC = 'italic';
    public const TYPE_UNDERLINE = 'underline';
    public const TYPE_STRIKETHROUGH = 'strikethrough';
    public const TYPE_SPOILER = 'spoiler';
    public const TYPE_DATETIME = 'datetime';
    public const TYPE_TEXT_MENTION = 'text_mention';
    public const TYPE_SUBSCRIPT = 'subscript';
    public const TYPE_SUPERSCRIPT = 'superscript';
    public const TYPE_MARKED = 'marked';
    public const TYPE_CODE = 'code';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';
    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';
    public const TYPE_URL = 'url';
    public const TYPE_EMAIL_ADDRESS = 'email_address';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_BANK_CARD_NUMBER = 'bank_card_number';
    public const TYPE_MENTION = 'mention';
    public const TYPE_HASHTAG = 'hashtag';
    public const TYPE_CASHTAG = 'cashtag';
    public const TYPE_BOT_COMMAND = 'bot_command';
    public const TYPE_ANCHOR = 'anchor';
    public const TYPE_ANCHOR_LINK = 'anchor_link';
    public const TYPE_REFERENCE = 'reference';
    public const TYPE_REFERENCE_LINK = 'reference_link';";
    }

    private function factoryInputRichBlock(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PARAGRAPH => new InputRichBlockParagraph($data),
            self::TYPE_SECTION_HEADING => new InputRichBlockSectionHeading($data),
            self::TYPE_PREFORMATTED => new InputRichBlockPreformatted($data),
            self::TYPE_FOOTER => new InputRichBlockFooter($data),
            self::TYPE_DIVIDER => new InputRichBlockDivider($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new InputRichBlockMathematicalExpression($data),
            self::TYPE_ANCHOR => new InputRichBlockAnchor($data),
            self::TYPE_LIST => new InputRichBlockList($data),
            self::TYPE_BLOCK_QUOTATION => new InputRichBlockBlockQuotation($data),
            self::TYPE_PULL_QUOTATION => new InputRichBlockPullQuotation($data),
            self::TYPE_COLLAGE => new InputRichBlockCollage($data),
            self::TYPE_SLIDESHOW => new InputRichBlockSlideshow($data),
            self::TYPE_TABLE => new InputRichBlockTable($data),
            self::TYPE_DETAILS => new InputRichBlockDetails($data),
            self::TYPE_MAP => new InputRichBlockMap($data),
            self::TYPE_ANIMATION => new InputRichBlockAnimation($data),
            self::TYPE_AUDIO => new InputRichBlockAudio($data),
            self::TYPE_PHOTO => new InputRichBlockPhoto($data),
            self::TYPE_VIDEO => new InputRichBlockVideo($data),
            self::TYPE_VOICE_NOTE => new InputRichBlockVoiceNote($data),
            self::TYPE_THINKING => new InputRichBlockThinking($data),
            default => throw new \InvalidArgumentException('Unknown InputRichBlock type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryRichBlock(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_PARAGRAPH => new RichBlockParagraph($data),
            self::TYPE_SECTION_HEADING => new RichBlockSectionHeading($data),
            self::TYPE_PREFORMATTED => new RichBlockPreformatted($data),
            self::TYPE_FOOTER => new RichBlockFooter($data),
            self::TYPE_DIVIDER => new RichBlockDivider($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new RichBlockMathematicalExpression($data),
            self::TYPE_ANCHOR => new RichBlockAnchor($data),
            self::TYPE_LIST => new RichBlockList($data),
            self::TYPE_BLOCK_QUOTATION => new RichBlockBlockQuotation($data),
            self::TYPE_PULL_QUOTATION => new RichBlockPullQuotation($data),
            self::TYPE_COLLAGE => new RichBlockCollage($data),
            self::TYPE_SLIDESHOW => new RichBlockSlideshow($data),
            self::TYPE_TABLE => new RichBlockTable($data),
            self::TYPE_DETAILS => new RichBlockDetails($data),
            self::TYPE_MAP => new RichBlockMap($data),
            self::TYPE_ANIMATION => new RichBlockAnimation($data),
            self::TYPE_AUDIO => new RichBlockAudio($data),
            self::TYPE_PHOTO => new RichBlockPhoto($data),
            self::TYPE_VIDEO => new RichBlockVideo($data),
            self::TYPE_VOICE_NOTE => new RichBlockVoiceNote($data),
            self::TYPE_THINKING => new RichBlockThinking($data),
            default => throw new \InvalidArgumentException('Unknown RichBlock type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function factoryRichText(): string
    {
        return <<<'PHP'
    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_BOLD => new RichTextBold($data),
            self::TYPE_ITALIC => new RichTextItalic($data),
            self::TYPE_UNDERLINE => new RichTextUnderline($data),
            self::TYPE_STRIKETHROUGH => new RichTextStrikethrough($data),
            self::TYPE_SPOILER => new RichTextSpoiler($data),
            self::TYPE_DATETIME => new RichTextDateTime($data),
            self::TYPE_TEXT_MENTION => new RichTextTextMention($data),
            self::TYPE_SUBSCRIPT => new RichTextSubscript($data),
            self::TYPE_SUPERSCRIPT => new RichTextSuperscript($data),
            self::TYPE_MARKED => new RichTextMarked($data),
            self::TYPE_CODE => new RichTextCode($data),
            self::TYPE_CUSTOM_EMOJI => new RichTextCustomEmoji($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new RichTextMathematicalExpression($data),
            self::TYPE_URL => new RichTextUrl($data),
            self::TYPE_EMAIL_ADDRESS => new RichTextEmailAddress($data),
            self::TYPE_PHONE_NUMBER => new RichTextPhoneNumber($data),
            self::TYPE_BANK_CARD_NUMBER => new RichTextBankCardNumber($data),
            self::TYPE_MENTION => new RichTextMention($data),
            self::TYPE_HASHTAG => new RichTextHashtag($data),
            self::TYPE_CASHTAG => new RichTextCashtag($data),
            self::TYPE_BOT_COMMAND => new RichTextBotCommand($data),
            self::TYPE_ANCHOR => new RichTextAnchor($data),
            self::TYPE_ANCHOR_LINK => new RichTextAnchorLink($data),
            self::TYPE_REFERENCE => new RichTextReference($data),
            self::TYPE_REFERENCE_LINK => new RichTextReferenceLink($data),
            default => throw new \InvalidArgumentException('Unknown RichText type: ' . ($data['type'] ?? 'null')),
        };
    }
PHP;
    }

    private function resolveInputRichBlock(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'paragraph' => new InputRichBlockParagraph($this->properties),
            'section_heading' => new InputRichBlockSectionHeading($this->properties),
            'preformatted' => new InputRichBlockPreformatted($this->properties),
            'footer' => new InputRichBlockFooter($this->properties),
            'divider' => new InputRichBlockDivider($this->properties),
            'mathematical_expression' => new InputRichBlockMathematicalExpression($this->properties),
            'anchor' => new InputRichBlockAnchor($this->properties),
            'list' => new InputRichBlockList($this->properties),
            'block_quotation' => new InputRichBlockBlockQuotation($this->properties),
            'pull_quotation' => new InputRichBlockPullQuotation($this->properties),
            'collage' => new InputRichBlockCollage($this->properties),
            'slideshow' => new InputRichBlockSlideshow($this->properties),
            'table' => new InputRichBlockTable($this->properties),
            'details' => new InputRichBlockDetails($this->properties),
            'map' => new InputRichBlockMap($this->properties),
            'animation' => new InputRichBlockAnimation($this->properties),
            'audio' => new InputRichBlockAudio($this->properties),
            'photo' => new InputRichBlockPhoto($this->properties),
            'video' => new InputRichBlockVideo($this->properties),
            'voice_note' => new InputRichBlockVoiceNote($this->properties),
            'thinking' => new InputRichBlockThinking($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputRichBlock type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveRichBlock(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'paragraph' => new RichBlockParagraph($this->properties),
            'section_heading' => new RichBlockSectionHeading($this->properties),
            'preformatted' => new RichBlockPreformatted($this->properties),
            'footer' => new RichBlockFooter($this->properties),
            'divider' => new RichBlockDivider($this->properties),
            'mathematical_expression' => new RichBlockMathematicalExpression($this->properties),
            'anchor' => new RichBlockAnchor($this->properties),
            'list' => new RichBlockList($this->properties),
            'block_quotation' => new RichBlockBlockQuotation($this->properties),
            'pull_quotation' => new RichBlockPullQuotation($this->properties),
            'collage' => new RichBlockCollage($this->properties),
            'slideshow' => new RichBlockSlideshow($this->properties),
            'table' => new RichBlockTable($this->properties),
            'details' => new RichBlockDetails($this->properties),
            'map' => new RichBlockMap($this->properties),
            'animation' => new RichBlockAnimation($this->properties),
            'audio' => new RichBlockAudio($this->properties),
            'photo' => new RichBlockPhoto($this->properties),
            'video' => new RichBlockVideo($this->properties),
            'voice_note' => new RichBlockVoiceNote($this->properties),
            'thinking' => new RichBlockThinking($this->properties),
            default => throw new \InvalidArgumentException('Unknown RichBlock type: ' . $this->type),
        };
    }
PHP;
    }

    private function resolveRichText(): string
    {
        return <<<'PHP'
public function resolve(): Entity
    {
        return match($this->type) {
            'bold' => new RichTextBold($this->properties),
            'italic' => new RichTextItalic($this->properties),
            'underline' => new RichTextUnderline($this->properties),
            'strikethrough' => new RichTextStrikethrough($this->properties),
            'spoiler' => new RichTextSpoiler($this->properties),
            'datetime' => new RichTextDateTime($this->properties),
            'text_mention' => new RichTextTextMention($this->properties),
            'subscript' => new RichTextSubscript($this->properties),
            'superscript' => new RichTextSuperscript($this->properties),
            'marked' => new RichTextMarked($this->properties),
            'code' => new RichTextCode($this->properties),
            'custom_emoji' => new RichTextCustomEmoji($this->properties),
            'mathematical_expression' => new RichTextMathematicalExpression($this->properties),
            'url' => new RichTextUrl($this->properties),
            'email_address' => new RichTextEmailAddress($this->properties),
            'phone_number' => new RichTextPhoneNumber($this->properties),
            'bank_card_number' => new RichTextBankCardNumber($this->properties),
            'mention' => new RichTextMention($this->properties),
            'hashtag' => new RichTextHashtag($this->properties),
            'cashtag' => new RichTextCashtag($this->properties),
            'bot_command' => new RichTextBotCommand($this->properties),
            'anchor' => new RichTextAnchor($this->properties),
            'anchor_link' => new RichTextAnchorLink($this->properties),
            'reference' => new RichTextReference($this->properties),
            'reference_link' => new RichTextReferenceLink($this->properties),
            default => throw new \InvalidArgumentException('Unknown RichText type: ' . $this->type),
        };
    }
PHP;
    }
}