<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Rating extends Tag
{
    protected const NAME = 'rating';

    protected array $_allowedParents = [Channel::class];
}
