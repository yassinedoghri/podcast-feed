<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class Interval implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        $value = (float) $value;
        if ($value < $params['min'] || $value > $params['max']) {
            return false;
        }

        return true;
    }
}
