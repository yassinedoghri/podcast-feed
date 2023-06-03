<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastRemoteItem extends Tag
{
    protected const NAME = 'podcast:remoteItem';

    protected bool $_multiple = true;

    protected ?string $_plural = 'remoteItems';

    protected array $_allowedParents = [Channel::class, PodcastPodroll::class, PodcastValueTimeSplit::class];

    protected array $_allowedAttributes = ['feedGuid', 'feedUrl', 'itemGuid', 'medium'];

    protected array $_requiredAttributes = ['feedGuid'];

    protected array $_attributesValidationRules = [
        'feedGuid' => [Validator::ValidUUIDv5],
        'medium' => [
            [Validator::InList, ['podcast', 'music', 'video', 'film', 'audiobook', 'newsletter', 'blog']],
        ],
    ];
}
