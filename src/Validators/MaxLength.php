<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class MaxLength implements ValidatorInterface
{
    public static function isValid(string $value, $params = []): bool
    {
        return strlen($value) <= $params[0];
    }
}
