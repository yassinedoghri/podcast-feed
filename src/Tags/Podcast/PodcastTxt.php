<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastTxt extends Tag
{
    protected const NAME = 'podcast:txt';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected bool $_multiple = true;

    protected ?string $_plurals = 'txts';

    protected array $_allowedAttributes = ['purpose'];

    protected array $_attributesValidationRules = [
        'purpose' => [[Validator::MaxLength, [128]]],
    ];

    protected array $_validationRules = [Validator::NotEmpty, [Validator::MaxLength, [128]]];
}
