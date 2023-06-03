<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Author extends Tag
{
    protected const NAME = 'author';

    protected array $_allowedParents = [Item::class];
}
