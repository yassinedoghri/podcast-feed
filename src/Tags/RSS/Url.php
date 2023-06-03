<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Url extends Tag
{
    protected const NAME = 'url';

    protected array $_allowedParents = [Image::class];
}
