<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

/**
 * @property PodcastRemoteItem $podcast_remoteItem
 */
class PodcastPodroll extends Tag
{
    protected const NAME = 'podcast:podroll';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [PodcastRemoteItem::class];
}
