<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastFunding extends Tag
{
    protected const NAME = 'podcast:funding';

    protected bool $_multiple = true;

    protected ?string $_plural = 'fundings';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedAttributes = ['platform', 'url'];

    protected array $_requiredAttributes = ['platform', 'url'];

    protected array $_validationRules = [Validator::NotEmpty, [Validator::MaxLength, [128]]];
}
