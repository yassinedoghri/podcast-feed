<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Itunes;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use PodcastFeed\Tags\Tag;

class ItunesDuration extends Tag
{
    protected const NAME = 'itunes:duration';

    protected array $_allowedParents = [Item::class];

    protected array $_validationRules = [Validator::NotEmpty, Validator::ValidDuration];

    public function getSeconds(): float
    {
        if (is_numeric($this->_value)) {
            return (float) $this->_value;
        }

        // adapted from https://stackoverflow.com/a/20874702/8926095
        $seconds = 0;
        foreach (array_reverse(explode(':', (string) $this->_value)) as $key => $value) {
            $seconds += 60 ** $key * (float) $value;
        }

        return $seconds;
    }
}
