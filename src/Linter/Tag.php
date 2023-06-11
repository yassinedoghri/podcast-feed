<?php

declare(strict_types=1);

namespace PodcastFeed\Linter;

class Tag
{
    public ?string $namespace = null;

    public string $name;

    public string $value = '';

    /**
     * @var array<class-string<Tag>, int>
     */
    public array $children = [];

    public int $childrenCount = 0;

    /**
     * @var array<class-string<Tag>>
     */
    public array $ascendants = [];

    /**
     * @var array<string, string>
     */
    public array $attributes = [];

    public int $attributesCount = 0;

    public function __construct(
        string $name,
        public int $line,
        public int $column,
        public int $level
    ) {
        if (str_contains($name, ':')) {
            $explodedName = explode(':', $name);
            $this->namespace = $explodedName[0];
            $this->name = $explodedName[1];
        } else {
            $this->name = $name;
        }
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function addAttribute(string $name, string $value): void
    {
        $this->attributes[$name] = $value;
        $this->attributesCount++;
    }

    /**
     * @param class-string<Tag> $child
     */
    public function addChild(string $child): void
    {
        if (! array_key_exists($child, $this->children)) {
            $this->children[$child] = 0;
        }

        $this->children[$child]++;
        $this->childrenCount++;
    }

    public function hasAttributes(): bool
    {
        return $this->attributesCount !== 0;
    }

    public function hasChildren(): bool
    {
        return $this->childrenCount !== 0;
    }

    /**
     * @param class-string<Tag> $ascendant
     */
    public function addAscendant(string $ascendant): void
    {
        $this->ascendants[] = $ascendant;
    }

    /**
     * @return null|class-string<Tag>
     */
    public function getParent(): ?string
    {
        $parent = end($this->ascendants);

        if (! $parent) {
            return null;
        }

        return $parent;
    }

    public function isEmpty(): bool
    {
        if ($this->value !== '') {
            return false;
        }

        if ($this->hasChildren()) {
            return false;
        }

        return true;
    }
}
