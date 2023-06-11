<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class RecommendedChildren implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach ($context as $recommendedChild) {
            if (! in_array($recommendedChild, array_keys($tag->children), true)) {
                $errors[] = $recommendedChild . ' is recommended for ' . $tag::class;
            }
        }

        return $errors;
    }
}
