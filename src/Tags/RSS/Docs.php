<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Docs extends Tag
{
    protected const NAME = 'docs';

    protected array $_allowedParents = [Channel::class];
}
