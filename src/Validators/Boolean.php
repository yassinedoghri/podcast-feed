<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class Boolean implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return in_array(strtolower($value), ['true', 'false', 'yes', 'no'], true);
    }
}
