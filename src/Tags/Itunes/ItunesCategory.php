<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

/**
 * @property ItunesCategory $itunes_category
 */
class ItunesCategory extends Tag
{
    protected const NAME = 'itunes:category';

    protected bool $_multiple = true;

    protected ?string $_plural = 'itunes_categories';

    protected array $_allowedParents = [Channel::class, self::class];

    protected array $_allowedChildren = [self::class];

    protected array $_allowedAttributes = ['text'];

    protected array $_requiredAttributes = ['text'];
}
