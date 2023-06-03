<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class ManagingEditor extends Tag
{
    protected const NAME = 'managingEditor';

    protected array $_allowedParents = [Channel::class];
}
