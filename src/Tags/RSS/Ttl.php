<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Ttl extends Tag
{
    protected const NAME = 'ttl';

    protected array $_allowedParents = [Channel::class];
}
