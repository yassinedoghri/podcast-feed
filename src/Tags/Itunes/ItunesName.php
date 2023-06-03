<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\Tag;

class ItunesName extends Tag
{
    protected const NAME = 'itunes:name';

    protected array $_allowedParents = [ItunesOwner::class];
}
