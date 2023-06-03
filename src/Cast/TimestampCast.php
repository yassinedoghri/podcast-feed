<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

use Exception;

class TimestampCast extends BaseCast
{
    public static function get($value): int
    {
        $value = strtotime($value);

        if ($value === false) {
            throw new Exception('Invalid timestamp for ' . $value);
        }

        return $value;
    }
}
