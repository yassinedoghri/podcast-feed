<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Hour extends Tag
{
    protected const NAME = 'hour';

    protected bool $_multiple = true;

    protected ?string $_plural = 'hours';

    protected array $_allowedParents = [SkipHours::class];
}
