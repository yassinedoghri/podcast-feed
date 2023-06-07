<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

/**
 * @property Channel $channel
 */
class Rss extends Tag
{
    protected const NAME = 'rss';

    protected array $_allowedChildren = [Channel::class];

    protected array $_requiredChildren = [Channel::class];
}
