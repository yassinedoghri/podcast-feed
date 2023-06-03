<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidBase64 implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        return base64_encode((string) base64_decode($value, true)) === $value;
    }
}
