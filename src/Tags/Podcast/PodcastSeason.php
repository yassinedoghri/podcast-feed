<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastSeason extends Tag
{
    protected const NAME = 'podcast:season';

    protected array $_allowedParents = [Item::class];

    protected array $_validationRules = [Validator::NaturalNoZero];

    protected array $_allowedAttributes = ['name'];

    protected array $_attributesValidationRules = [
        'name' => [[Validator::MaxLength, [128]]],
    ];
}
