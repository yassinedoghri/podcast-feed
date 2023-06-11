<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\Rules;

use Exception;
use PodcastFeed\Linter\Rule;
use PodcastFeed\Linter\Tag;
use PodcastFeed\Validators\ValidatorInterface;

class ValidAttributeFormat implements Rule
{
    public function processTag(Tag $tag, array $context): array
    {
        $errors = [];
        foreach ($context as $attributeKey => $validatorContext) {
            if (! in_array($attributeKey, array_keys($tag->attributes), true)) {
                continue;
            }

            if (! is_array($validatorContext)) {
                $validatorContext = [$validatorContext];
            }

            foreach ($validatorContext as $validator) {
                if (! is_array($validator)) {
                    $validator = [$validator];
                }

                $validatorClass = $validator[0];

                if (! class_exists($validatorClass)) {
                    throw new Exception($validatorClass . ' validator does not exist');
                }

                /** @var ValidatorInterface $validatorInstance */
                $validatorInstance = new $validatorClass();

                $params = $validator[1] ?? [];
                if (! $validatorInstance->isValid($tag->attributes[$attributeKey], $params)) {
                    $errors[] = $tag->attributes[$attributeKey] . ' format is not valid.';
                }
            }
        }

        return $errors;
    }
}
