<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

/** @deprecated */
class ItunesKeywords extends Tag
{
    protected const NAME = 'itunes:keywords';

    protected array $_allowedParents = [Channel::class, Item::class];
}
