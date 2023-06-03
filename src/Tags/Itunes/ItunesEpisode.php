<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Cast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesEpisode extends Tag
{
    protected const NAME = 'itunes:episode';

    protected array $_allowedParents = [Item::class];

    protected array $_validationRules = [Validator::NotEmpty, Validator::NaturalNoZero];

    protected Cast $_cast = Cast::Integer;
}
