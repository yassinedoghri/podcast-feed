<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

/**
 * @property PodcastRemoteItem $podcast_remoteItem
 */
class PodcastValueTimeSplit extends Tag
{
    protected const NAME = 'podcast:valueTimeSplit';

    protected array $_allowedParents = [PodcastValue::class];

    protected array $_allowedChildren = [PodcastRemoteItem::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_valueTimeSplits';

    protected array $_allowedAttributes = ['startTime', 'duration', 'remotePercentage'];

    protected array $_requiredAttributes = ['startTime', 'duration', 'remotePercentage'];

    protected array $_attributesValidationRules = [
        'type' => [Validator::NotEmpty],
        'address' => [Validator::NotEmpty],
        'split' => [Validator::NotEmpty],
        'fee' => [Validator::Boolean],
    ];
}
