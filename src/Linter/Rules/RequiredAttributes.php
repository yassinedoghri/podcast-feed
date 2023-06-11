<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;

class RequiredAttributes implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach ($context as $requiredAttribute) {
            if (! in_array($requiredAttribute, array_keys($tag->attributes), true)) {
                $errors[] = $requiredAttribute . ' attribute not found, it is required for ' . $tag::class;
            }
        }
        return $errors;
    }
}
