<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Tag;

class TextInput extends Tag
{
    protected const NAME = 'textInput';

    protected array $_allowedParents = [Channel::class];
}
