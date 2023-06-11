<?php

declare(strict_types=1);

namespace PodcastFeed\Linter;

interface Rule
{
    /**
     * @param array<mixed> $context
     *
     * @return string[]
     */
    public function processTag(Tag $node, array $context): array;
}
