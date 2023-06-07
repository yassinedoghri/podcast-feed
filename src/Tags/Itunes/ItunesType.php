<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class ItunesType extends Tag
{
    protected const NAME = 'itunes:type';

    protected mixed $_defaultValue = 'episodic';

    protected array $_allowedParents = [Channel::class];

    protected array $_validationRules = [Validator::NotEmpty, [Validator::InList, ['episodic', 'serial']]];
}
