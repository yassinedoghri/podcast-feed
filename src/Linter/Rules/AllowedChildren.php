<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class AllowedChildren implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach ($tag->children as $child) {
            if (! in_array($child, $context, true)) {
                $errors[] = $child . ' is not allowed as a child of ' . $tag::class;
            }
        }

        return [];
    }
}
