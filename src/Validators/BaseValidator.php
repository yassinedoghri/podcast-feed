<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

use Exception;

class BaseValidator implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        throw new Exception(self::class . ' must implement isValid() method.');
    }
}
