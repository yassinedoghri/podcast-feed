<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\Podcast;

use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Item;
use SimpleXMLElement;

class PodcastLiveItem extends Item
{
    protected const NAME = 'podcast:liveItem';

    protected bool $_multiple = true;

    protected ?string $_plural = 'podcast_liveItems';

    protected array $_allowedAttributes = ['status', 'start', 'end'];

    protected array $_requiredAttributes = ['status', 'start', 'end'];

    protected array $_attributesValidationRules = [
        'status' => [Validator::NotEmpty, [Validator::InList, ['pending', 'live', 'ended']]],
        'start' => [Validator::NotEmpty, Validator::ValidDatetime],
        'end' => [Validator::NotEmpty, Validator::ValidDatetime],
    ];

    public function __construct(
        string $key,
        ?SimpleXMLElement $element,
        // @phpstan-ignore-next-line
        private readonly array $_ascendants = []
    ) {
        $this->_allowedChildren = array_merge($this->_allowedChildren, [
            PodcastContentLink::class,
            PodcastAlternateEnclosure::class,
        ]);

        $this->_requiredChildren = array_merge($this->_requiredChildren, [
            PodcastContentLink::class,
        ]);

        $this->_recommendedChildren = array_merge($this->_recommendedChildren, [
            PodcastAlternateEnclosure::class,
        ]);

        parent::__construct($key, $element, $_ascendants);
    }
}
