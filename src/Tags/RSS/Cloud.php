<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Cloud extends Tag
{
    protected const NAME = 'cloud';

    protected array $_allowedParents = [Channel::class];
}
