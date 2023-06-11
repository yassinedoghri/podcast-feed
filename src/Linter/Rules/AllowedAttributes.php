<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class AllowedAttributes implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach (array_keys($tag->attributes) as $attribute) {
            if (! in_array($attribute, $context, true)) {
                $errors[] = $attribute . ' attribute is not allowed for ' . $tag::class;
            }
        }

        return [];
    }
}
