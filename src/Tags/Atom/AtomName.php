<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Atom;

use PodcastFeed\Tags\Tag;

class AtomName extends Tag
{
    protected const NAME = 'atom:name';

    protected array $_allowedParents = [AtomContributor::class];
}
