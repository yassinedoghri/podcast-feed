<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class LastBuildDate extends Tag
{
    protected const NAME = 'lastBuildDate';

    protected array $_allowedParents = [Channel::class];
}
