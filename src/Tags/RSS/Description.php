<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Description extends Tag
{
    protected const NAME = 'description';

    protected array $_allowedParents = [Channel::class, Item::class, Image::class];
}
