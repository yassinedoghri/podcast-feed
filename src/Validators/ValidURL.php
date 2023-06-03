<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidURL implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }
}
