<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastGuid extends Tag
{
    protected const NAME = 'podcast:guid';

    protected array $_allowedParents = [Channel::class];

    protected array $_validationRules = [Validator::NotEmpty, Validator::ValidUUIDv5];
}
