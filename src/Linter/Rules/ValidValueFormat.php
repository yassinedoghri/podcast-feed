<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use Exception;
use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;
use PodcastFeed\Validators\ValidatorInterface;

class ValidValueFormat implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        if (! is_array($context)) {
            $context = [$context];
        }

        foreach ($context as $validator) {
            if (! is_array($validator)) {
                $validator = [$validator];
            }

            $validatorClass = $validator[0];

            if (! class_exists($validatorClass)) {
                throw new Exception($validatorClass . ' validator does not exist.');
            }

            /** @var ValidatorInterface $validatorInstance */
            $validatorInstance = new $validatorClass();

            $params = $validator[1] ?? [];
            if (! $validatorInstance->isValid($tag->value, $params)) {
                return ['Value `' . $tag->value . '` for ' . $tag::class . ' is not valid.'];
            }
        }

        return [];
    }
}
