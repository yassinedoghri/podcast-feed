<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

abstract class BaseCast implements CastInterface
{
    /**
     * Get
     *
     * @param array<mixed>|bool|float|int|object|string|null $value  Data
     *
     * @return array<mixed>|bool|float|int|object|string|null
     */
    public static function get($value)
    {
        return $value;
    }

    /**
     * Set
     *
     * @param array<mixed>|bool|float|int|object|string|null $value  Data
     *
     * @return array<mixed>|bool|float|int|object|string|null
     */
    public static function set($value)
    {
        return $value;
    }
}
