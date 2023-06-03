<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Height extends Tag
{
    protected const NAME = 'height';

    protected array $_allowedParents = [Image::class];
}
