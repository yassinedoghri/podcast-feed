<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

class StringCast extends BaseCast
{
    public static function get($value): string
    {
        return (string) $value;
    }
}
