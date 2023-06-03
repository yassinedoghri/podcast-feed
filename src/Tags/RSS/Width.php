<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Width extends Tag
{
    protected const NAME = 'width';

    protected array $_allowedParents = [Image::class];
}
