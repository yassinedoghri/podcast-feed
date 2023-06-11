<?php

declare(strict_types=1);

namespace PodcastFeed\Linter;

use PodcastFeed\Linter\Config\LinterConfig;
use PodcastFeed\Parser\Parser;

class Linter
{
    /**
     * @var string[]
     */
    public array $errors = [];

    public function __construct(
        protected LinterConfig $config
    ) {
    }

    public function verify(string $xml): void
    {
        $parser = new Parser($xml);
        $parser->parse();

        d($parser->tags, $parser->errors);

        // traverse parsed XML
        $rules = $this->config->getRules();
        foreach ($parser->tags as $tag) {
            // TODO: this flags self closing tags as being empty
            // if ($tag->isEmpty()) {
            //     $this->errors[] = $tag::class . ' is empty.';
            // }

            // for each node, run rules if found
            $tagClass = $tag::class;
            if (in_array($tagClass, array_keys($rules), true)) {
                foreach ($rules[$tag::class] as $ruleClass => $options) {
                    if (! is_array($options)) {
                        $options = [$options];
                    }

                    /** @var Rule $rule */
                    $rule = new $ruleClass($options);
                    $this->errors = array_merge($this->errors, $rule->processTag($tag, $options));
                }
            }
        }
    }
}
