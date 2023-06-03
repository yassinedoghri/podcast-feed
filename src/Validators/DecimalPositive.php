<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class DecimalPositive implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        return (int) $value >= 0;
    }
}
