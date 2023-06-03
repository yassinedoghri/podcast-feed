<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidIETFLanguageCode implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        // check if well formed using regex
        // Based on https://www.w3.org/TR/REC-html40/struct/dirlang.html#langcodes
        // language-code = primary-code ( "-" subcode )*
        $result = preg_match('~^(?<code>[A-Za-z]{2,3})?$~', $value, $matches);

        if ($result !== 1) {
            return false;
        }

        return locale_get_display_name($matches['language']) !== $matches['language'];
    }
}
