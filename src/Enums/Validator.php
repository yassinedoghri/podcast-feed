<?php

declare(strict_types=1);

namespace PodcastFeed\Enums;

enum Validator: string
{
    case Boolean = 'boolean';
    case NotEmpty = 'not_empty';
    case Natural = 'natural';
    case DecimalPositive = 'decimal_positive';
    case ValidDuration = 'valid_duration';
    case NaturalNoZero = 'natural_no_zero';
    case Numeric = 'numeric';
    case InList = 'in_list';
    case MaxLength = 'max_length';
    case ValidDatetime = 'valid_datetime';
    case ValidMimeType = 'valid_mime_type';
    case ValidURL = 'valid_url';
    case ValidLanguageCode = 'valid_language_code';
    case ValidIETFLanguageCode = 'valid_ietf_language_code';
    case ValidBase64 = 'valid_base64';
    case ValidUUIDv5 = 'valid_uuidv5';
}
