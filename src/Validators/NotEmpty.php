<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class NotEmpty implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return $value !== '';
    }
}
