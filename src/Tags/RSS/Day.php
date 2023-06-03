<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Day extends Tag
{
    protected const NAME = 'day';

    protected bool $_multiple = true;

    protected ?string $_plural = 'days';

    protected array $_allowedParents = [SkipDays::class];
}
