<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class Natural implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        if (! ctype_digit($value)) {
            return false;
        }

        return (int) $value >= 0;
    }
}
