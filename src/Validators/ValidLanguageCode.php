<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidLanguageCode implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        // check if well formed using regex
        // Based on https://www.w3.org/TR/REC-html40/struct/dirlang.html#langcodes
        // language-code = primary-code ( "-" subcode )*
        $result = preg_match('~^(?<language>[A-Za-z]{2})(-(?<region>[A-Za-z]{2,3}))?$~', $value, $matches);

        if ($result !== 1) {
            return false;
        }

        if (locale_get_display_name($matches['language']) === $matches['language']) {
            return false;
        }

        if (! array_key_exists('region', $matches)) {
            return true;
        }

        return locale_get_display_region('-' . $matches['region']) !== '';
    }
}
