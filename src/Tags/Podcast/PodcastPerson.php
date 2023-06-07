<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastPerson extends Tag
{
    protected const NAME = 'podcast:person';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_persons';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_validationRules = [Validator::NotEmpty, [Validator::MaxLength, [128]]];

    protected array $_allowedAttributes = ['name', 'url', 'imageUrl', 'role', 'group'];

    protected array $_requiredAttributes = ['url', 'type'];

    protected array $_attributesDefaultValues = [
        'role' => 'Host',
        'group' => 'Cast',
    ];
}
