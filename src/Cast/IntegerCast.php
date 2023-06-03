<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

class IntegerCast extends BaseCast
{
    public static function get($value): int
    {
        return (int) $value;
    }
}
