<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidUUIDv5 implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return @preg_match(
            '~^[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}$~',
            $value
        ) === 1;
    }
}
