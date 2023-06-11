<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class RequiredChildren implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach ($context as $requiredChild) {
            if (! in_array($requiredChild, array_keys($tag->children), true)) {
                $errors[] = $requiredChild . ' is required for ' . $tag::class;
            }
        }

        return $errors;
    }
}
