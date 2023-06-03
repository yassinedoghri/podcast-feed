<?php

declare(strict_types=1);

namespace PodcastFeed\Enums;

enum Cast: string
{
    case String = 'string';
    case Integer = 'integer';
    case Float = 'float';
    case Boolean = 'boolean';
    case DateTime = 'datetime';
    case Timestamp = 'timestamp';
    case URI = 'uri';
}
