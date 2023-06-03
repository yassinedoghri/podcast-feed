<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Category extends Tag
{
    protected const NAME = 'category';

    protected array $_allowedParents = [Channel::class];
}
