<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastPreviousUrl extends Tag
{
    protected const NAME = 'podcast:previousUrl';

    protected array $_allowedParents = [Channel::class];

    protected array $_validationRules = [Validator::ValidURL];
}
