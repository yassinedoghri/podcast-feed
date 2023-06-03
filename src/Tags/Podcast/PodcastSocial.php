<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Tags\RSS\Channel;
use PodcastFeed\Tags\Tag;

class PodcastSocial extends Tag
{
    protected const NAME = 'podcast:social';

    protected bool $_multiple = true;

    protected ?string $_plural = 'socials';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [PodcastSocialSignUp::class];

    protected array $_allowedAttributes = ['platform', 'id', 'url'];

    protected array $_requiredAttributes = ['platform'];
}
