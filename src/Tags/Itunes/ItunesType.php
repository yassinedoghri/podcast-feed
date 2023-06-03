<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class ItunesType extends Tag
{
    protected const NAME = 'itunes:type';

    protected array $_allowedParents = [Channel::class];
}
