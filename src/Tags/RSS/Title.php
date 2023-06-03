<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Title extends Tag
{
    protected const NAME = 'title';

    protected array $_allowedParents = [Channel::class, Item::class, Image::class];
}
