<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastLocked extends Tag
{
    protected const NAME = 'podcast:locked';

    protected array $_allowedParents = [Channel::class];

    protected Cast $_cast = Cast::Boolean;

    protected array $_allowedAttributes = ['owner'];
}
