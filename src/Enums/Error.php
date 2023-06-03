<?php

declare(strict_types=1);

namespace PodcastFeed\Enums;

enum Error
{
    case AttributeEmpty;
    case AttributeMissing;
    case TagEmpty;
    case TagMissing;
    case TagNotImplemented;
    case UnknownTag;
}
