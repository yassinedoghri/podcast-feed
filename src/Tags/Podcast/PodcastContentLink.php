<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class PodcastContentLink extends Tag
{
    protected const NAME = 'podcast:contentLink';

    protected array $_allowedParents = [PodcastLiveItem::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_contentLinks';

    protected array $_validationRules = [Validator::NotEmpty];

    protected array $_allowedAttributes = ['href'];

    protected array $_requiredAttributes = ['href'];

    protected array $_attributesValidationRules = [
        'href' => [Validator::ValidURL],
    ];
}
