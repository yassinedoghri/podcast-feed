<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Copyright extends Tag
{
    protected const NAME = 'copyright';

    protected array $_allowedParents = [Channel::class];
}
