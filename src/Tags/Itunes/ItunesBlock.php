<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesBlock extends Tag
{
    protected const NAME = 'itunes:block';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected Cast $_cast = Cast::Boolean;
}
