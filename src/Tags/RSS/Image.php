<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

/**
 * @property Url $url,
 * @property Title $title,
 * @property Link $link,
 * @property Width $width,
 * @property Height $height,
 * @property Description $description,
 */
class Image extends Tag
{
    protected const NAME = 'image';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedChildren = [
        Url::class,
        Title::class,
        Link::class,
        Width::class,
        Height::class,
        Description::class,
    ];

    protected array $_requiredChildren = [Url::class, Title::class, Link::class];
}
