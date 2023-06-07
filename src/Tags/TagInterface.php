<?php

declare(strict_types=1);

namespace PodcastFeed\Tags;

use SimpleXMLElement;

/**
 * @universalObjectCrate
 */
interface TagInterface
{
    /**
     * @param class-string<Tag>[] $ascendants
     */
    public function __construct(string $key, ?SimpleXMLElement $element, array $ascendants = []);
}
