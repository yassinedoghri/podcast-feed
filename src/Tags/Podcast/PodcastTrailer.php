<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastTrailer extends Tag
{
    protected const NAME = 'podcast:trailer';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_trailers';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedAttributes = ['pubdate', 'url', 'length', 'type', 'season'];

    protected array $_requiredAttributes = ['pubdate', 'url'];

    protected array $_recommendedAttributes = ['length', 'type'];

    protected array $_attributesValidationRules = [
        'url' => [Validator::ValidURL],
        'pubdate' => [Validator::ValidDatetime],
        'length' => [Validator::Natural],
        'type' => [Validator::ValidMimeType],
        'season' => [Validator::Natural],
    ];
}
