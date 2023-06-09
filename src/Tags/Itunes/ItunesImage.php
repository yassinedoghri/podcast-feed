<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesImage extends Tag
{
    protected const NAME = 'itunes:image';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedAttributes = ['href'];

    protected array $_requiredAttributes = ['href'];
}
