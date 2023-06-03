<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Enums\Cast;

use PodcastFeed\Tags\Tag;

class PubDate extends Tag
{
    protected const NAME = 'pubDate';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected Cast $_cast = Cast::DateTime;
}
