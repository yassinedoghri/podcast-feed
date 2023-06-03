<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

class BooleanCast extends BaseCast
{
    public static function get($value): bool
    {
        return in_array(strtolower($value), ['yes', 'true'], true);
    }
}
