<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

/**
 * @property Day[] $days
 */
class SkipDays extends Tag
{
    protected const NAME = 'skipDays';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [Day::class];
}
