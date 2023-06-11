<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastTranscript extends Tag
{
    protected const NAME = 'podcast:transcript';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_transcripts';

    protected array $_allowedParents = [Item::class];

    protected array $_allowedAttributes = ['url', 'type', 'language', 'rel'];

    protected array $_requiredAttributes = ['url', 'type'];

    protected array $_attributesValidationRules = [
        'url'  => [Validator::ValidURL],
        'type' => [
            [Validator::InList, [
                'text/plain',
                'text/html',
                'text/vtt',
                'text/srt',
                'application/srt',
                'application/json',
                'application/x-subrip',
                'application/xml',
            ],
            ],
        ],
        'language' => [Validator::ValidLanguageCode],
    ];
}
