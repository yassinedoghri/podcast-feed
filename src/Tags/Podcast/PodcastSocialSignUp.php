<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\Tag;

class PodcastSocialSignUp extends Tag
{
    protected const NAME = 'podcast:socialSignUp';

    protected array $_allowedParents = [PodcastSocial::class];

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_socialSignUps';

    protected array $_allowedAttributes = ['homeUrl', 'signUpUrl', 'priority'];

    protected array $_requiredAttributes = ['homeUrl'];

    protected array $_recommendedAttributes = ['signUpUrl'];

    protected array $_attributesValidationRules = [
        'homeUrl'   => [Validator::ValidURL],
        'signupUrl' => [Validator::ValidURL],
        'priority'  => [Validator::NaturalNoZero],
    ];
}
