<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

use DateTime;
use Exception;

class DatetimeCast extends BaseCast
{
    public static function get($value): DateTime
    {
        $timestamp = strtotime($value);

        if (! $timestamp) {
            throw new Exception("Could not cast $value to Datetime.");
        }

        $datetime = new DateTime();
        $datetime->setTimestamp($timestamp);

        return $datetime;
    }
}
