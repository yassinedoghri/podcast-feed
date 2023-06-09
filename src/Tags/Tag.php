<?php

declare(strict_types=1);

namespace PodcastFeed\Tags;

use AllowDynamicProperties;
use Exception;
use PodcastFeed\Cast\BaseCast;
use PodcastFeed\Cast\BooleanCast;
use PodcastFeed\Cast\CastInterface;
use PodcastFeed\Cast\DatetimeCast;
use PodcastFeed\Cast\FloatCast;
use PodcastFeed\Cast\IntegerCast;
use PodcastFeed\Cast\StringCast;
use PodcastFeed\Cast\TimestampCast;
use PodcastFeed\Enums\Cast;
use PodcastFeed\Enums\Error;
use PodcastFeed\Enums\Validator;
use PodcastFeed\Tags\RSS\Rss;
use PodcastFeed\Validators\Boolean;
use PodcastFeed\Validators\DecimalPositive;
use PodcastFeed\Validators\InList;
use PodcastFeed\Validators\MaxLength;
use PodcastFeed\Validators\Natural;
use PodcastFeed\Validators\NaturalNoZero;
use PodcastFeed\Validators\NotEmpty;
use PodcastFeed\Validators\Numeric;
use PodcastFeed\Validators\ValidatorInterface;
use PodcastFeed\Validators\ValidDatetime;
use PodcastFeed\Validators\ValidDuration;
use PodcastFeed\Validators\ValidLanguageCode;
use PodcastFeed\Validators\ValidMimeType;
use PodcastFeed\Validators\ValidURL;
use PodcastFeed\Validators\ValidUUIDv5;
use SimpleXMLElement;

#[AllowDynamicProperties]
abstract class Tag implements TagInterface
{
    protected const NAME = '_tag';

    /**
     * @var array<string, int>
     */
    protected static array $_counts = [];

    /**
     * @var array<string, array<string>>
     */
    protected static array $_warnings = [];

    /**
     * @var array<string, array<string>>
     */
    protected static array $_errors = [];

    protected mixed $_value = null;

    protected mixed $_defaultValue = null;

    /**
     * @var array<string, mixed>
     */
    protected array $_attributes = [];

    /**
     * @var array<string, mixed>
     */
    protected array $_attributesDefaultValues = [];

    protected bool $_multiple = false;

    /**
     * Used as the property name to stack elements in an array if $_multiple property is set to true
     */
    protected ?string $_plural = null;

    /**
     * @var class-string<Tag>[]
     */
    protected array $_allowedParents = [];

    /**
     * @var array<array{0: Validator, 1: mixed[]}|Validator>
     */
    protected array $_validationRules = [];

    /**
     * @var array<string, array<Validator|array{0: Validator, 1: mixed[]}>>
     */
    protected array $_attributesValidationRules = [];

    protected Cast $_cast = Cast::String;

    /**
     * @var class-string<Tag>[]
     */
    protected array $_allowedChildren = [];

    /**
     * @var class-string<Tag>[]
     */
    protected array $_recommendedChildren = [];

    /**
     * @var class-string<Tag>[]
     */
    protected array $_requiredChildren = [];

    /**
     * @var string[]
     */
    protected array $_allowedAttributes = [];

    /**
     * @var string[]
     */
    protected array $_recommendedAttributes = [];

    /**
     * @var string[]
     */
    protected array $_requiredAttributes = [];

    /**
     * @var array<string, Cast>
     */
    protected array $_attributesCast = [];

    private readonly string $_key;

    /**
     * @var class-string<Tag>[]
     */
    private array $_children = [];

    private int $_childrenCount;

    private readonly int $_lineNumber;

    /**
     * Default convert handlers
     *
     * @var array<string, class-string<BaseCast>>
     */
    private array $_defaultCastHandlers = [
        'boolean' => BooleanCast::class,
        'datetime' => DatetimeCast::class,
        'float' => FloatCast::class,
        'integer' => IntegerCast::class,
        'string' => StringCast::class,
        'timestamp' => TimestampCast::class,
    ];

    /**
     * Default validation handlers
     * @var array<string, class-string<ValidatorInterface>>
     */
    private array $_defaultValidationHandlers = [
        'boolean' => Boolean::class,
        'decimal_positive' => DecimalPositive::class,
        'natural' => Natural::class,
        'natural_no_zero' => NaturalNoZero::class,
        'not_empty' => NotEmpty::class,
        'numeric' => Numeric::class,
        'in_list' => InList::class,
        'max_length' => MaxLength::class,
        'valid_language_code' => ValidLanguageCode::class,
        'valid_uuidv5' => ValidUUIDv5::class,
        'valid_url' => ValidURL::class,
        'valid_mime_type' => ValidMimeType::class,
        'valid_datetime' => ValidDatetime::class,
        'valid_duration' => ValidDuration::class,
    ];

    /**
     * @param class-string<Tag>[] $_ascendants
     */
    public function __construct(
        string $key,
        ?SimpleXMLElement $element,
        private array $_ascendants = [Rss::class]
    ) {
        if (array_key_exists($this::NAME, self::$_counts)) {
            ++self::$_counts[$this::NAME];
        } else {
            self::$_counts[$this::NAME] = 1;
        }

        if ($this->_multiple) {
            $key .= self::$_counts[$this::NAME];
        }

        $this->_key = $key;
        $this->_childrenCount = 0;

        if ($element instanceof SimpleXMLElement) {
            $node = dom_import_simplexml($element);
            $this->_lineNumber = $node->getLineNo();

            $this->traverse($element);

            // set not traversed children to default
            $allowedChildrenNotPresent = array_diff($this->_allowedChildren, $this->_children);

            foreach ($allowedChildrenNotPresent as $tagClassName) {
                $tagProperty = str_replace(':', '_', str_replace('-', '', lcfirst(ucwords($tagClassName::NAME, '-'))));

                if (! class_exists($tagClassName)) {
                    $tagClassName = UnknownTag::class;
                    $this->warn('Unknown tag in ' . $this::NAME);
                }

                $ascendants = [...$this->_ascendants, static::class];

                /** @var Tag $tagObject */
                $tagObject = new $tagClassName($tagProperty, null, $ascendants);

                if ($tagObject->_multiple) {
                    if ($tagObject->_plural === null) {
                        throw new Exception("_plural property is not set for: " . $tagClassName);
                    }

                    $this->{$tagObject->_plural} = [];
                } else {
                    $this->{$tagProperty} = $tagObject;
                }
            }

            if ($this->_childrenCount === 0) {
                $rawValue = trim((string) $element);
                $this->validate($rawValue);
                $this->_value = $this->cast($rawValue, $this->_cast);
            }

            if ($element->attributes() instanceof SimpleXMLElement) {
                $attributes = $element->attributes();
                foreach ($attributes as $key => $element) {
                    $rawValue = trim((string) $element);
                    $this->validateAttribute($key, $rawValue);
                    $this->_attributes[$key] = $this->cast($rawValue, $this->_attributesCast[$key] ?? Cast::String);
                }
            }

            $this->validateChildren();
        }
    }

    /**
     * @return class-string<Tag>[]
     */
    protected function getAllowedParents(): array
    {
        return $this->_allowedParents;
    }

    /**
     * @return class-string<Tag>[]
     */
    protected function getAllowedChildren(): array
    {
        return $this->_allowedChildren;
    }

    /**
     * @return string[]
     */
    protected function getAllowedAttributes(): array
    {
        return $this->_allowedAttributes;
    }

    /**
     * @return array<string, string[]>
     */
    public function getWarnings(): array
    {
        // @phpstan-ignore-next-line
        return self::$_warnings;
    }

    /**
     * @return array<string, string[]>
     */
    public function getErrors(): array
    {
        // @phpstan-ignore-next-line
        return self::$_errors;
    }

    public function getValue(mixed $default = null): mixed
    {
        if ($this->_value !== null) {
            return $this->_value;
        }

        if ($default !== null) {
            return $default;
        }

        return $this->_defaultValue;
    }

    public function getAttribute(string $key, mixed $default = null): mixed
    {
        if (in_array($key, $this->_attributes, true)) {
            return $this->_attributes[$key];
        }

        if ($default !== null) {
            return $default;
        }

        // check if in allowed attributes
        if (in_array($key, $this->_allowedAttributes, true)) {
            // return default if present
            if (in_array($key, array_keys($this->_attributesDefaultValues))) {
                return $this->_attributesDefaultValues[$key];
            }

            return null;
        }

        throw new Exception('"' . $key . '" attribute is not allowed for ' . $this::NAME . ' tag.');
    }

    /**
     * @return class-string<Tag>
     */
    public function getParent(): string
    {
        $parent = end($this->_ascendants);

        if (! $parent) {
            throw new Exception('Could not get parent of ' . $this::NAME);
        }

        return $parent;
    }

    private function traverse(SimpleXMLElement $node): void
    {
        $namespaces = [
            [
                'node' => $node->children(),
                'prefix' => null,
                'folder' => 'RSS',
                'classPrefix' => '',
            ],
            [
                'node' => $node->children('atom', true),
                'prefix' => 'atom',
                'folder' => 'Atom',
                'classPrefix' => 'Atom',
            ],
            [
                'node' => $node->children('content', true),
                'prefix' => 'content',
                'folder' => 'Content',
                'classPrefix' => 'Content',
            ],
            [
                'node' => $node->children('itunes', true),
                'prefix' => 'itunes',
                'folder' => 'Itunes',
                'classPrefix' => 'Itunes',
            ],
            [
                'node' => $node->children('podcast', true),
                'prefix' => 'podcast',
                'folder' => 'Podcast',
                'classPrefix' => 'Podcast',
            ],
        ];

        foreach ($namespaces as $namespace) {
            foreach ($namespace['node'] as $tag => $element) {
                $tagName = implode(':', array_filter([$namespace['prefix'], $tag]));
                $tagProperty = str_replace(':', '_', str_replace('-', '', lcfirst(ucwords($tagName, '-'))));

                /** @var class-string<Tag> $tagClassName */
                $tagClassName = 'PodcastFeed\Tags\\' . $namespace['folder'] . '\\' . $namespace['classPrefix'] . str_replace(
                    [':', '-'],
                    '',
                    ucwords($tag, ':-')
                );

                if (! class_exists($tagClassName)) {
                    $tagClassName = UnknownTag::class;
                    $this->warn('Unknown tag in ' . $this::NAME);
                }

                $ascendants = [...$this->_ascendants, static::class];

                if (! $element instanceof SimpleXMLElement) {
                    throw new Exception('<' . $tag . '> tag is missing.');
                }

                $this->incrementChildrenCount();
                $this->_children[] = $tagClassName;

                /** @var Tag $tagObject */
                $tagObject = new $tagClassName($tagProperty, $element, $ascendants);

                if ($tagObject->_multiple) {
                    if ($tagObject->_plural === null) {
                        throw new Exception("_plural property is not set for: " . $tagClassName);
                    }

                    $this->{$tagObject->_plural}[$tagObject->_key] = $tagObject;
                } else {
                    $this->{$tagProperty} = $tagObject;
                }
            }
        }
    }

    private function incrementChildrenCount(): void
    {
        $this->_childrenCount = ++$this->_childrenCount;
    }

    private function error(Error|string $message, ?string $attribute = null): void
    {
        // @phpstan-ignore-next-line
        self::$_errors[$this->_key][] = $this->getMessage($message, $attribute);
    }

    private function warn(Error|string $message, ?string $attribute = null): void
    {
        // @phpstan-ignore-next-line
        self::$_warnings[$this->_key][] = $this->getMessage($message, $attribute);
    }

    private function getMessage(Error|string $message, ?string $attribute = null): string
    {
        if (! $message instanceof Error) {
            return 'Line ' . $this->_lineNumber . ' - ' . $message;
        }

        if (! in_array($message, [Error::AttributeEmpty, Error::AttributeMissing], true)) {
            return match ($message) {
                Error::TagEmpty => '<' . $this::NAME . '> tag is empty.',
                Error::TagMissing => '<' . $this::NAME . '> tag is missing.',
                Error::TagNotImplemented => '<' . $this::NAME . '> tag not implemented.',
                Error::UnknownTag => '<' . $this::NAME . '> is unknown.'
            };
        }

        if ($attribute !== null) {
            return match ($message) {
                Error::AttributeEmpty => '"' . $attribute . '" attribute is empty for tag <' . $this::NAME . '>.',
                Error::AttributeMissing => '"' . $attribute . '" attribute is missing for tag <' . $this::NAME . '>.',
            };
        }

        throw new Exception('The message requires param #2 ($attribute).');
    }

    private function cast(string $value, Cast $castType = Cast::String): mixed
    {
        $castHandler = $this->_defaultCastHandlers[$castType->value];

        /** @var CastInterface $castHandlerInstance */
        $castHandlerInstance = new $castHandler();

        return $castHandlerInstance->get($value);
    }

    private function validateAttribute(string $attribute, string $value): void
    {
        if (! array_key_exists($attribute, $this->_attributesValidationRules)) {
            return;
        }

        foreach ($this->_attributesValidationRules[$attribute] as $validator) {
            if ($validator instanceof Validator) {
                $validator = [$validator, []];
            }

            $validationHandler = $this->_defaultValidationHandlers[$validator[0]->value];

            /** @var ValidatorInterface $validationHandlerInstance */
            $validationHandlerInstance = new $validationHandler();

            if (! $validationHandlerInstance->isValid($value, $validator[1])) {
                $this->error('Invalid value ' . $value . ' for ' . $attribute . ' attribute in ' . self::NAME);
            }
        }
    }

    private function validate(string $value): void
    {
        foreach ($this->_validationRules as $validator) {
            if ($validator instanceof Validator) {
                $validator = [$validator, []];
            }

            $validationHandler = $this->_defaultValidationHandlers[$validator[0]->value];

            /** @var ValidatorInterface $validationHandlerInstance */
            $validationHandlerInstance = new $validationHandler();

            if (! $validationHandlerInstance->isValid($value, $validator[1])) {
                $this->error('Invalid value ' . $value . ' for ' . self::NAME);
            }
        }
    }

    private function validateChildren(): void
    {
        $isParentAllowed = false;
        foreach ($this->_allowedParents as $allowedParent) {
            if ($this->isTag($this->getParent(), $allowedParent)) {
                $isParentAllowed = true;
            }
        }

        if (! $isParentAllowed) {
            d($this->_allowedParents, $this->getParent());
            $this->error($this::NAME . ' cannot have ' . $this->getParent()::NAME . ' as parent.');
        }

        foreach ($this->_children as $child) {
            if (! in_array($child, $this->_allowedChildren, true)) {
                $this->error($child::NAME . ' is not allowed as a child of ' . $this::NAME);
            }
        }

        foreach ($this->_requiredChildren as $requiredChild) {
            if (! in_array($requiredChild, $this->_children, true)) {
                $this->error($requiredChild::NAME . ' is required as a child of ' . $this::NAME);
            }
        }

        foreach ($this->_recommendedChildren as $recommendedChild) {
            if (! in_array($recommendedChild, $this->_children, true)) {
                $this->warn($recommendedChild::NAME . ' is recommended as a child of ' . $this::NAME);
            }
        }
    }

    /**
     * @param class-string<Tag> $tagClass1
     * @param class-string<Tag> $tagClass2
     */
    private function isTag(string $tagClass1, string $tagClass2): bool
    {
        // use this to force the load of the classes
        if (! class_exists($tagClass1)) {
            throw new Exception("Class $tagClass1 not found");
        }

        // use this to force the load of the classes
        if (! class_exists($tagClass2)) {
            throw new Exception("Class $tagClass2 not found");
        }

        if ($tagClass1 === $tagClass2) {
            return true;
        }

        return is_subclass_of($tagClass1, $tagClass2);
    }
}
