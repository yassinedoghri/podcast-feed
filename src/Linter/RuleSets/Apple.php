<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\RuleSets;

use PodcastFeed\Linter\Rules\AllowedAttributes;
use PodcastFeed\Linter\Rules\AllowedChildren;
use PodcastFeed\Linter\Rules\AllowedParent;
use PodcastFeed\Linter\Rules\RecommendedChildren;
use PodcastFeed\Linter\Rules\RequiredAttributes;
use PodcastFeed\Linter\Rules\RequiredChildren;
use PodcastFeed\Linter\Rules\ValidAttributeFormat;
use PodcastFeed\Linter\Rules\ValidValueFormat;
use PodcastFeed\Linter\RuleSet;
use PodcastFeed\Linter\Tags\Channel;
use PodcastFeed\Linter\Tags\Copyright;
use PodcastFeed\Linter\Tags\Description;
use PodcastFeed\Linter\Tags\Enclosure;
use PodcastFeed\Linter\Tags\Guid;
use PodcastFeed\Linter\Tags\Item;
use PodcastFeed\Linter\Tags\ItunesAuthor;
use PodcastFeed\Linter\Tags\ItunesBlock;
use PodcastFeed\Linter\Tags\ItunesCategory;
use PodcastFeed\Linter\Tags\ItunesComplete;
use PodcastFeed\Linter\Tags\ItunesDuration;
use PodcastFeed\Linter\Tags\ItunesEmail;
use PodcastFeed\Linter\Tags\ItunesEpisode;
use PodcastFeed\Linter\Tags\ItunesEpisodeType;
use PodcastFeed\Linter\Tags\ItunesExplicit;
use PodcastFeed\Linter\Tags\ItunesImage;
use PodcastFeed\Linter\Tags\ItunesName;
use PodcastFeed\Linter\Tags\ItunesNewFeedUrl;
use PodcastFeed\Linter\Tags\ItunesOwner;
use PodcastFeed\Linter\Tags\ItunesSeason;
use PodcastFeed\Linter\Tags\ItunesTitle;
use PodcastFeed\Linter\Tags\ItunesType;
use PodcastFeed\Linter\Tags\Language;
use PodcastFeed\Linter\Tags\Link;
use PodcastFeed\Linter\Tags\PubDate;
use PodcastFeed\Linter\Tags\Title;
use PodcastFeed\Validators\Boolean;
use PodcastFeed\Validators\InList;
use PodcastFeed\Validators\NaturalNoZero;
use PodcastFeed\Validators\Numeric;
use PodcastFeed\Validators\ValidDuration;
use PodcastFeed\Validators\ValidURL;

class Apple extends RuleSet
{
    public static array $rules = [
        Channel::class => [
            RequiredChildren::class => [
                Title::class,
                Description::class,
                ItunesImage::class,
                Language::class,
                ItunesCategory::class,
                ItunesExplicit::class,
            ],
            RecommendedChildren::class => [ItunesAuthor::class, Link::class, ItunesOwner::class],
            AllowedChildren::class     => [
                Title::class,
                Description::class,
                ItunesImage::class,
                Language::class,
                ItunesCategory::class,
                ItunesExplicit::class,
                ItunesAuthor::class,
                Link::class,
                ItunesOwner::class,
                ItunesTitle::class,
                ItunesType::class,
                Copyright::class,
                ItunesNewFeedUrl::class,
                ItunesBlock::class,
                ItunesComplete::class,
            ],
        ],
        Item::class => [
            RequiredChildren::class    => [Title::class, Enclosure::class],
            RecommendedChildren::class => [
                Guid::class,
                PubDate::class,
                Description::class,
                ItunesDuration::class,
                Link::class,
                ItunesImage::class,
                ItunesExplicit::class,
            ],
            AllowedChildren::class => [
                Title::class,
                Enclosure::class,
                Guid::class,
                PubDate::class,
                Description::class,
                ItunesDuration::class,
                Link::class,
                ItunesImage::class,
                ItunesExplicit::class,
                ItunesTitle::class,
                ItunesEpisode::class,
                ItunesSeason::class,
                ItunesEpisodeType::class,
                ItunesBlock::class,
            ],
        ],
        ItunesImage::class => [
            AllowedParent::class        => [Channel::class, Item::class],
            AllowedAttributes::class    => ['href'],
            RequiredAttributes::class   => ['href'],
            ValidAttributeFormat::class => [
                'href' => ValidURL::class,
            ],
        ],
        ItunesCategory::class => [
            AllowedParent::class      => [Channel::class, ItunesCategory::class],
            AllowedAttributes::class  => ['text'],
            RequiredAttributes::class => ['text'],
        ],
        ItunesExplicit::class => [
            AllowedParent::class    => [Channel::class, Item::class],
            ValidValueFormat::class => [Boolean::class, [InList::class, ['true', 'false']]],
        ],
        ItunesAuthor::class => [
            AllowedParent::class => [Channel::class],
        ],
        ItunesOwner::class => [
            AllowedParent::class    => [Channel::class],
            AllowedChildren::class  => [ItunesName::class, ItunesEmail::class],
            RequiredChildren::class => [ItunesEmail::class],
        ],
        ItunesTitle::class => [
            AllowedParent::class => [Channel::class, Item::class],
        ],
        ItunesType::class => [
            AllowedParent::class    => [Channel::class],
            ValidValueFormat::class => [[InList::class, ['episodic', 'serial']]],
        ],
        ItunesNewFeedUrl::class => [
            ValidValueFormat::class => ValidURL::class,
        ],
        ItunesBlock::class => [
            AllowedParent::class    => [Channel::class, Item::class],
            ValidValueFormat::class => [[InList::class, ['yes']]],
        ],
        ItunesComplete::class => [
            AllowedParent::class    => [Channel::class],
            ValidValueFormat::class => [[InList::class, ['yes']]],
        ],
        ItunesDuration::class => [
            AllowedParent::class    => [Item::class],
            ValidValueFormat::class => ValidDuration::class,
        ],
        ItunesEpisode::class => [
            AllowedParent::class    => [Item::class],
            ValidValueFormat::class => [Numeric::class, NaturalNoZero::class],
        ],
        ItunesSeason::class => [
            AllowedParent::class    => [Item::class],
            ValidValueFormat::class => [Numeric::class, NaturalNoZero::class],
        ],
        ItunesEpisodeType::class => [
            AllowedParent::class    => [Item::class],
            ValidValueFormat::class => [[InList::class, ['trailer', 'full', 'bonus']]],
        ],
    ];
}
