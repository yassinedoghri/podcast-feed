<?php

declare(strict_types=1);

namespace PodcastFeed\Linter;

class RuleSet
{
    /**
     * @var array<class-string<Tag>, array<class-string<Rule>, string|array<mixed>>>
     */
    public static array $rules;
}
