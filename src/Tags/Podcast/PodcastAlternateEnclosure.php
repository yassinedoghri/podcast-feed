<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastAlternateEnclosure extends Tag
{
    protected const NAME = 'podcast:alternateEnclosure';

    protected bool $_multiple = true;

    protected ?string $_plural = 'alternate_enclosures';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = [
        'type',
        'length',
        'bitrate',
        'height',
        'lang',
        'title',
        'rel',
        'codecs',
        'default',
    ];

    protected array $_requiredAttributes = ['type'];

    protected array $_recommendedAttributes = ['length'];

    protected array $_attributesValidationRules = [
        'type' => [Validator::ValidMimeType],
        'length' => [Validator::Natural],
        'bitrate' => [Validator::Natural],
        'height' => [Validator::Natural],
        'lang' => [Validator::ValidIETFLanguageCode],
        'default' => [Validator::Boolean],
    ];

    protected array $_allowedChildren = [PodcastSource::class, PodcastIntegrity::class];

    protected array $_requiredChildren = [PodcastSource::class];
}
