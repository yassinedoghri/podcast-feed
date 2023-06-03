<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class Numeric implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return is_numeric($value);
    }
}
