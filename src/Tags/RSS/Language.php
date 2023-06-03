<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class Language extends Tag
{
    protected const NAME = 'language';

    protected array $_allowedParents = [Channel::class];

    protected array $_validationRules = [Validator::ValidLanguageCode];
}
