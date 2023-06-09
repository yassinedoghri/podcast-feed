<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Atom;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class AtomContributor extends Tag
{
    protected const NAME = 'atom:contributor';

    protected bool $_multiple = true;

    protected ?string $_plural = 'atom_contributors';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedChildren = [AtomName::class, AtomUri::class];

    protected array $_requiredChildren = [AtomName::class];
}
