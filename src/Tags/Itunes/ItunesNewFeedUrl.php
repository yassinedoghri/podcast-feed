<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class ItunesNewFeedUrl extends Tag
{
    protected const NAME = 'itunes:new-feed-url';

    protected array $_allowedParents = [Channel::class];
}
