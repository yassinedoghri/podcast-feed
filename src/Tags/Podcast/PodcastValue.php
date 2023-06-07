<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

/**
 * @property PodcastValueRecipient $podcast_valueRecipient
 * @property PodcastValueTimeSplit $podcast_valueTimeSplit
 */
class PodcastValue extends Tag
{
    protected const NAME = 'podcast:value';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_value';

    protected array $_allowedChildren = [PodcastValueRecipient::class, PodcastValueTimeSplit::class];

    protected array $_requiredChildren = [PodcastValueRecipient::class];

    protected array $_allowedAttributes = ['type', 'method', 'suggested'];

    protected array $_requiredAttributes = ['type', 'method'];

    protected array $_attributesValidationRules = [
        'type' => [Validator::NotEmpty],
        'method' => [Validator::NotEmpty],
        'suggested' => [Validator::DecimalPositive],
    ];
}
