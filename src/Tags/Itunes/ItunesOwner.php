<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

/**
 * @property ItunesName $itunes_name
 * @property ItunesEmail $itunes_email
 */
class ItunesOwner extends Tag
{
    protected const NAME = 'itunes:owner';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [ItunesName::class, ItunesEmail::class];

    protected array $_requiredChildren = [ItunesEmail::class];
}
