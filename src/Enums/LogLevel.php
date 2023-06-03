<?php

declare(strict_types=1);

namespace PodcastFeed\Enums;

enum LogLevel
{
    case Info;
    case Warning;
    case Error;
    case Critical;
}
