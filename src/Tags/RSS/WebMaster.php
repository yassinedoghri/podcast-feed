<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class WebMaster extends Tag
{
    protected const NAME = 'webMaster';

    protected array $_allowedParents = [Channel::class];
}
