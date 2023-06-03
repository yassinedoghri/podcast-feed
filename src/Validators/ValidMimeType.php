<?php

declare(strict_types=1);

namespace PodcastFeed\Validators;

class ValidMimeType implements ValidatorInterface
{
    public static function isValid(string $value, array $params = []): bool
    {
        // regex from https://stackoverflow.com/a/48046041/8926095
        return @preg_match(
            "/^(application|audio|font|example|image|message|model|multipart|text|video|x-(?:[0-9A-Za-z!#$%&'*+.^_`|~-]+))\/([0-9A-Za-z!#$%&'*+.^_`|~-]+)((?:[ \t]*;[ \t]*[0-9A-Za-z!#$%&'*+.^_`|~-]+=(?:[0-9A-Za-z!#$%&'*+.^_`|~-]+|\"(?:[^\"\\\\]|\\.)*\"))*)$/",
            $value
        ) === 1;
    }
}
