<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesEpisodeType extends Tag
{
    protected const NAME = 'itunes:episodeType';

    protected mixed $_defaultValue = 'full';

    protected array $_allowedParents = [Item::class];

    protected array $_validationRules = [Validator::NotEmpty, [Validator::InList, ['trailer', 'full', 'bonus']]];
}
