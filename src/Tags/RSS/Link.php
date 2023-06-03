<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Link extends Tag
{
    protected const NAME = 'link';

    protected array $_allowedParents = [Channel::class, Item::class, Image::class];
}
