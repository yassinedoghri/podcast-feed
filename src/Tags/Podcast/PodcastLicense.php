<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastLicense extends Tag
{
    protected const NAME = 'podcast:license';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedAttributes = ['url'];

    protected array $_validationRules = [[Validator::MaxLength, [128]]];

    protected array $_attributesValidationRules = [
        'url' => [Validator::ValidURL],
    ];
}
