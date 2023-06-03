<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class PodcastIntegrity extends Tag
{
    protected const NAME = 'podcast:integrity';

    protected array $_allowedParents = [PodcastAlternateEnclosure::class];

    protected array $_allowedAttributes = ['type', 'value'];

    protected array $_requiredAttributes = ['type', 'value'];

    protected array $_attributesValidationRules = [
        'type' => [Validator::NotEmpty, [Validator::InList, ['sri', 'pgp-signature']]],
        'value' => [Validator::NotEmpty, Validator::ValidBase64],
    ];
}
