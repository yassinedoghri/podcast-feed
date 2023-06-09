<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Enums\Cast;

use PodcastFeed\Tags\Tag;

class Enclosure extends Tag
{
    protected const NAME = 'enclosure';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['url', 'type', 'length'];

    protected array $_requiredAttributes = ['url', 'type'];

    protected array $_attributesCast = [
        'length' => Cast::Integer,
    ];
}
