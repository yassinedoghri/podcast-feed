<?php

declare(strict_types=1);

namespace PodcastFeed\Cast;

/**
 * Interface CastInterface
 */
interface CastInterface
{
    /**
     * Get
     *
     * @param array<mixed>|bool|float|int|object|string|null $value  Data
     *
     * @return array<mixed>|bool|float|int|string|null;
     */
    public static function get($value);
}
