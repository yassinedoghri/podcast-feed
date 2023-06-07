<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Category extends Tag
{
    protected const NAME = 'category';

    protected bool $_multiple = true;

    protected ?string $_plural = 'categories';

    protected array $_allowedParents = [Channel::class];
}
