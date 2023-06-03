<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastId extends Tag
{
    protected const NAME = 'podcast:id';

    protected bool $_multiple = true;

    protected ?string $_plural = 'ids';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedAttributes = ['platform', 'id', 'url'];

    protected array $_requiredAttributes = ['platform', 'url'];
}
