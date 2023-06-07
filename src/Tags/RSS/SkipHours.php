<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

/**
 * @property Hour[] $hours
 */
class SkipHours extends Tag
{
    protected const NAME = 'skipHours';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [Hour::class];
}
