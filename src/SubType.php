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
        };
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
}
