<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

abstract class BaseCast implements CastInterface
{
    /**
     * Get
     *
     * @param string $value  Data
     *
     * @return array<mixed>|bool|float|int|object|string|null
     */
    public static function get($value)
    {
        return $value;
    }
}
