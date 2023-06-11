<?php

declare(strict_types=1);

namespace PodcastFeed\Parser;

use Exception;
use LibXMLError;
use PodcastFeed\Linter\Tag;
use XMLReader;

class Parser
{
    /**
     * @var Tag[]
     */
    public array $stack = [];

    /**
     * @var Tag[]
     */
    public array $tags = [];

    /**
     * @var LibXMLError[]
     */
    public array $errors = [];

    private int $depth = 0;

    public function __construct(
        private readonly string $xml
    ) {
    }

    public function parse(): void
    {
        libxml_use_internal_errors(true);

        $reader = new XMLReader();
        $reader->xml($this->xml);

        /** @var ?Tag $currentTag */
        $currentTag = null;

        while ($reader->read()) {
            switch ($reader->nodeType) {
                case XMLReader::ELEMENT:
                    /** @var class-string<Tag> $tagClassName */
                    $tagClassName = 'PodcastFeed\Linter\Tags\\' . str_replace(
                        [':', '-'],
                        '',
                        ucwords($reader->name, ':-')
                    );

                    if (! class_exists($tagClassName)) {
                        $tagClassName = Tag::class;
                    }

                    $lineNumber = 0;
                    $domNode = $reader->expand();
                    if ($domNode) {
                        $lineNumber = $domNode->getLineNo();
                    }

                    /** @var Tag $currentTag */
                    $currentTag = new $tagClassName($reader->name, $lineNumber, 0, $this->depth);

                    if ($reader->hasAttributes) {
                        while ($reader->moveToNextAttribute()) {
                            $currentTag->addAttribute($reader->name, trim($reader->value));
                        }
                        $reader->moveToElement();
                    }

                    $parent = end($this->stack);

                    if ($parent) {
                        $parent->addChild($currentTag::class);
                        $currentTag->addAscendant($parent::class);
                    }

                    $this->tags[] = $currentTag;
                    $this->stack[] = $currentTag;

                    $this->depth++;

                    // handle self closing tag
                    if ($reader->isEmptyElement) {
                        array_pop($this->stack);

                        $this->depth--;
                    }

                    break;
                case XMLReader::TEXT:
                case XMLReader::CDATA:
                    if (! $currentTag instanceof Tag) {
                        throw new Exception('Could not set value. $currentTag is not set.');
                    }

                    $currentTag->setValue(trim($reader->value));
                    break;
                case XMLReader::END_ELEMENT:
                    array_pop($this->stack);

                    $this->depth--;
                    break;
                default:
                    break;
            }
        }

        $this->errors = libxml_get_errors();
    }
}
