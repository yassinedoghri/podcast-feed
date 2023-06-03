<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastChapters extends Tag
{
    protected const NAME = 'podcast:chapters';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['url', 'type'];

    protected array $_requiredAttributes = ['url', 'type'];
}
