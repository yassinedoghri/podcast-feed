<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastLocation extends Tag
{
    protected const NAME = 'podcast:location';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedAttributes = ['osm', 'geo'];

    protected array $_recommendedAttributes = ['osm', 'geo'];
}
