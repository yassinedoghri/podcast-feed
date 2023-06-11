<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastComments extends Tag
{
    protected const NAME = 'podcast:comments';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['uri', 'contentType'];

    protected array $_requiredAttributes = ['uri', 'contentType'];

    protected array $_attributesValidationRules = [
        'uri'         => [Validator::ValidURL],
        'contentType' => [Validator::ValidMimeType],
    ];
}
