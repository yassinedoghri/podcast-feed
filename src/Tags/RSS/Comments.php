<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Comments extends Tag
{
    protected const NAME = 'comments';

    protected array $_allowedParents = [Item::class];
}
