<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Generator extends Tag
{
    protected const NAME = 'generator';

    protected array $_allowedParents = [Channel::class];
}
