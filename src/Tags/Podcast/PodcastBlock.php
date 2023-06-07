<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Cast;
use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class PodcastBlock extends Tag
{
    protected const NAME = 'podcast:block';

    protected array $_allowedParents = [Channel::class, Item::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_blocks';

    protected array $_allowedAttributes = ['id'];

    protected Cast $_cast = Cast::Boolean;

    protected array $_validationRules = [[Validator::InList, ['yes', 'no']]];

    protected array $_attributesValidationRules = [
        // service slugs from https://github.com/Podcastindex-org/podcast-namespace/blob/main/serviceslugs.txt
        // TODO: get them when building library?
        'id' => [
            [Validator::InList, [
                'acast',
                'amazon',
                'anchor',
                'apple',
                'audible',
                'audioboom',
                'backtracks',
                'bitcoin',
                'blubrry',
                'buzzsprout',
                'captivate',
                'castos',
                'castopod',
                'facebook',
                'fireside',
                'fyyd',
                'google',
                'gpodder',
                'hypercatcher',
                'kasts',
                'libsyn',
                'mastodon',
                'megafono',
                'megaphone',
                'omnystudio',
                'overcast',
                'paypal',
                'pinecast',
                'podbean',
                'podcastaddict',
                'podcastguru',
                'podcastindex',
                'podcasts',
                'podchaser',
                'podcloud',
                'podfriend',
                'podiant',
                'podigee',
                'podnews',
                'podomatic',
                'podserve',
                'podverse',
                'redcircle',
                'relay',
                'resonaterecordings',
                'rss',
                'shoutengine',
                'simplecast',
                'slack',
                'soundcloud',
                'spotify',
                'spreaker',
                'tiktok',
                'transistor',
                'twitter',
                'whooshkaa',
                'youtube',
                'zencast',
            ], ],
        ],
    ];
}
