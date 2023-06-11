<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class PodcastSource extends Tag
{
    protected const NAME = 'podcast:source';

    protected array $_allowedParents = [PodcastAlternateEnclosure::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_sources';

    protected array $_allowedAttributes = ['uri', 'contentType'];

    protected array $_requiredAttributes = ['uri'];

    protected array $_attributesValidationRules = [
        'uri'         => [Validator::ValidURL],
        'contentType' => [Validator::ValidMimeType],
    ];
}
