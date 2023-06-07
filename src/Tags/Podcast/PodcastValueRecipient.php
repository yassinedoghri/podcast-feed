<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class PodcastValueRecipient extends Tag
{
    protected const NAME = 'podcast:valueRecipient';

    protected array $_allowedParents = [PodcastValue::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_valueRecipients';

    protected array $_allowedAttributes = ['type', 'address', 'split', 'name', 'customKey', 'customValue', 'fee'];

    protected array $_requiredAttributes = ['type', 'address', 'split'];

    protected array $_recommendedAttributes = ['name'];

    protected array $_attributesValidationRules = [
        'type' => [Validator::NotEmpty],
        'address' => [Validator::NotEmpty],
        'split' => [Validator::NotEmpty],
        'fee' => [Validator::Boolean],
    ];
}
