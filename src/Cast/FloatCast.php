<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

class FloatCast extends BaseCast
{
    public static function get($value): float
    {
        return (float) $value;
    }
}
