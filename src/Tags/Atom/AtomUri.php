<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Atom;

use PodcastFeed\Tags\Tag;

class AtomUri extends Tag
{
    protected const NAME = 'atom:uri';

    protected array $_allowedParents = [AtomContributor::class];
}
