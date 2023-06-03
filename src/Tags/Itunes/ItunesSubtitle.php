<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

/** @deprecated */
class ItunesSubtitle extends Tag
{
    protected const NAME = 'itunes:subtitle';

    protected array $_allowedParents = [Channel::class, Item::class];
}
