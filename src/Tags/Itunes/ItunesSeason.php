<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesSeason extends Tag
{
    protected const NAME = 'itunes:season';

    protected array $_allowedParents = [Item::class];

    protected Cast $_cast = Cast::Integer;
}
