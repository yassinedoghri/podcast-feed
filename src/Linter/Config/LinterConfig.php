<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Config;

use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\RuleSet;
use PodcastFeed\Linter\Tag;

class LinterConfig
{
    /**
     * @var array<class-string<Tag>, array<class-string<Rule>, string|array<mixed>>>
     */
    private array $rules = [];

    /**
     * @param class-string<Tag> $tagClass
     * @param class-string<Rule> $ruleClass
     * @param array<mixed> $options
     */
    public function rule(string $tagClass, string $ruleClass, array $options): void
    {
        $this->rules[$tagClass][$ruleClass] = $options;
    }

    /**
     * @return array<class-string<Tag>, array<class-string<Rule>, string|array<mixed>>>
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * @param class-string<RuleSet>[] $ruleSets
     */
    public function sets(array $ruleSets): void
    {
        foreach ($ruleSets as $ruleSet) {
            $this->rules = [...$this->rules, ...$ruleSet::$rules];
        }
    }
}
