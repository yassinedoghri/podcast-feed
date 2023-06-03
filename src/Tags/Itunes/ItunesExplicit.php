<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesExplicit extends Tag
{
    protected const NAME = 'itunes:explicit';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected Cast $_cast = Cast::Boolean;
}
