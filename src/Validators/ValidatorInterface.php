<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

interface ValidatorInterface
{
    /**
     * isValid
     *
     * @param array<mixed> $params
     */
    public static function isValid(string $value, array $params = []): bool;
}
