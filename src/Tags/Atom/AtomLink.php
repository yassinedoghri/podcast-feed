<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Atom;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class AtomLink extends Tag
{
    protected const NAME = 'atom:link';

    protected bool $_multiple = true;

    protected ?string $_plural = 'links';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedAttributes = ['href', 'rel', 'type', 'hreflang', 'title', 'length'];

    protected array $_requiredAttributes = ['href'];
}
