<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class ItunesComplete extends Tag
{
    protected const NAME = 'itunes:complete';

    protected array $_allowedParents = [Channel::class];

    protected Cast $_cast = Cast::Boolean;
}
