<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class InList implements ValidatorInterface
{
    public static function isValid(string $value, $params = []): bool
    {
        return in_array($value, $params, true);
    }
}
