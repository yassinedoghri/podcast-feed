<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastSoundbite extends Tag
{
    protected const NAME = 'podcast:soundbite';

    protected bool $_multiple = true;

    protected ?string $_plural = 'soundbites';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['startTime', 'duration'];

    protected array $_requiredAttributes = ['startTime', 'duration'];

    protected array $_attributesValidationRules = [
        'startTime' => [Validator::Numeric],
        'duration' => [Validator::Numeric],
    ];

    protected array $_validationRules = [[Validator::MaxLength, [128]]];
}
