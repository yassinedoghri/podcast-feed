<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastComplete extends Tag
{
    protected const NAME = 'podcast:complete';

    protected array $_allowedParents = [Channel::class];

    protected Cast $_cast = Cast::Boolean;

    protected array $_validationRules = [[Validator::InList, ['yes', 'no']]];
}
