<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastImages extends Tag
{
    protected const NAME = 'podcast:images';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected array $_allowedAttributes = ['srcset'];

    protected array $_requiredAttributes = ['srcset'];

    protected array $_attributesValidationRules = [
        'srcset' => [Validator::NotEmpty],
    ];
}
