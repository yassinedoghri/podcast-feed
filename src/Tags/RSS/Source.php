<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Source extends Tag
{
    protected const NAME = 'source';

    protected array $_allowedParents = [Item::class];
}
