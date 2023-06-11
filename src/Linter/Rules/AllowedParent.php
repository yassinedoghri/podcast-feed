<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class AllowedParent implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        if (in_array($tag->getParent(), $context, true)) {
            return [];
        }

        return [$tag->getParent() . ' is not allowed as a parent of ' . $tag::class];
    }
}
