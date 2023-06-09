<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class Guid extends Tag
{
    protected const NAME = 'guid';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['isPermaLink'];
}
