<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Content;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

/**
 * @deprecated
 */
class ContentEncoded extends Tag
{
    protected const NAME = 'content:encoded';

    protected array $_allowedParents = [Channel::class, Item::class];
}
