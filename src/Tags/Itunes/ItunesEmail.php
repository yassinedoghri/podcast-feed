<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\Tag;

class ItunesEmail extends Tag
{
    protected const NAME = 'itunes:email';

    protected array $_allowedParents = [ItunesOwner::class];
}
