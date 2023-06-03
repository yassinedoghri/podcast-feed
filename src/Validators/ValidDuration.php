<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidDuration implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        if (is_numeric($value)) {
            return true;
        }

        return preg_match('/^(\d{1,2}:)?([0-5][0-9]:[0-5][0-9])$/', $value) === 1;
    }
}
