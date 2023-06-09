<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

/**
 * @property PodcastSocialSignUp $podcast_socialSignUp
 */
class PodcastSocial extends Tag
{
    protected const NAME = 'podcast:social';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_socials';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [PodcastSocialSignUp::class];

    protected array $_allowedAttributes = ['platform', 'accountId', 'accountUrl', 'priority', 'protocol'];

    protected array $_requiredAttributes = ['platform', 'accountUrl'];
}
