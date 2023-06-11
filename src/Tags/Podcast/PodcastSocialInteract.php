<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastSocialInteract extends Tag
{
    protected const NAME = 'podcast:socialInteract';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_socialInteracts';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['uri', 'protocol', 'accountId', 'accountUrl', 'priority'];

    protected array $_requiredAttributes = ['uri', 'protocol'];

    protected array $_recommendedAttributes = ['accountId'];

    protected array $_attributesValidationRules = [
        'uri' => [Validator::ValidURL],
        // from podcastindex https://github.com/Podcastindex-org/podcast-namespace/blob/main/socialprotocols.txt
        // TODO: get them when building library?
        'protocol'   => [[Validator::InList, ['disabled', 'activitypub', 'twitter', 'lightning']]],
        'accountUrl' => [Validator::ValidURL],
        'priority'   => [Validator::NaturalNoZero],
    ];
}
