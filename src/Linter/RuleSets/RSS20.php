<?php

declare(strict_types=1);

namespace PodcastFeed\Linter\RuleSets;

use PodcastFeed\Linter\Rules\AllowedAttributes;
use PodcastFeed\Linter\Rules\AllowedChildren;
use PodcastFeed\Linter\Rules\AllowedParent;
use PodcastFeed\Linter\Rules\RequiredChildren;
use PodcastFeed\Linter\Rules\ValidValueFormat;
use PodcastFeed\Linter\RuleSet;
use PodcastFeed\Linter\Tags\Author;
use PodcastFeed\Linter\Tags\Category;
use PodcastFeed\Linter\Tags\Channel;
use PodcastFeed\Linter\Tags\Cloud;
use PodcastFeed\Linter\Tags\Comments;
use PodcastFeed\Linter\Tags\Copyright;
use PodcastFeed\Linter\Tags\Day;
use PodcastFeed\Linter\Tags\Description;
use PodcastFeed\Linter\Tags\Docs;
use PodcastFeed\Linter\Tags\Enclosure;
use PodcastFeed\Linter\Tags\Generator;
use PodcastFeed\Linter\Tags\Guid;
use PodcastFeed\Linter\Tags\Height;
use PodcastFeed\Linter\Tags\Hour;
use PodcastFeed\Linter\Tags\Image;
use PodcastFeed\Linter\Tags\Item;
use PodcastFeed\Linter\Tags\Language;
use PodcastFeed\Linter\Tags\LastBuildDate;
use PodcastFeed\Linter\Tags\Link;
use PodcastFeed\Linter\Tags\ManagingEditor;
use PodcastFeed\Linter\Tags\Name;
use PodcastFeed\Linter\Tags\PubDate;
use PodcastFeed\Linter\Tags\Rating;
use PodcastFeed\Linter\Tags\Rss;
use PodcastFeed\Linter\Tags\SkipDays;
use PodcastFeed\Linter\Tags\SkipHours;
use PodcastFeed\Linter\Tags\Source;
use PodcastFeed\Linter\Tags\TextInput;
use PodcastFeed\Linter\Tags\Title;
use PodcastFeed\Linter\Tags\Ttl;
use PodcastFeed\Linter\Tags\Url;
use PodcastFeed\Linter\Tags\WebMaster;
use PodcastFeed\Linter\Tags\Width;
use PodcastFeed\Validators\InList;
use PodcastFeed\Validators\Interval;
use PodcastFeed\Validators\Natural;
use PodcastFeed\Validators\NaturalNoZero;
use PodcastFeed\Validators\ValidDatetime;
use PodcastFeed\Validators\ValidLanguageCode;
use PodcastFeed\Validators\ValidURL;

class RSS20 extends RuleSet
{
    public static array $rules = [
        Channel::class => [
            AllowedChildren::class => [
                Title::class,
                Link::class,
                Description::class,
                Language::class,
                Copyright::class,
                ManagingEditor::class,
                WebMaster::class,
                PubDate::class,
                LastBuildDate::class,
                Category::class,
                Generator::class,
                Docs::class,
                Cloud::class,
                Ttl::class,
                Image::class,
                Rating::class,
                TextInput::class,
                SkipHours::class,
                SkipDays::class,
            ],
            RequiredChildren::class => [Title::class, Link::class, Description::class],
            AllowedParent::class    => [Rss::class],
        ],
        Item::class => [
            AllowedChildren::class => [
                Title::class,
                Link::class,
                Description::class,
                Author::class,
                Category::class,
                Comments::class,
                Enclosure::class,
                Guid::class,
                PubDate::class,
                Source::class,
            ],
            AllowedParent::class => [Channel::class],
        ],
        Title::class => [
            AllowedParent::class => [Channel::class, Item::class, Image::class, TextInput::class],
        ],
        Link::class => [

            ValidValueFormat::class => ValidURL::class,
            AllowedParent::class    => [Channel::class, Item::class, Image::class, TextInput::class],
        ],
        Description::class => [

            AllowedParent::class => [Channel::class, Item::class, Image::class, TextInput::class],
        ],
        Language::class => [
            ValidValueFormat::class => ValidLanguageCode::class,
            AllowedParent::class    => [Channel::class],
        ],
        Copyright::class => [
            AllowedParent::class => [Channel::class],
        ],
        ManagingEditor::class => [
            AllowedParent::class => [Channel::class],
        ],
        WebMaster::class => [
            AllowedParent::class => [Channel::class],
        ],
        PubDate::class => [
            ValidValueFormat::class => ValidDatetime::class,
            AllowedParent::class    => [Channel::class, Item::class],
        ],
        LastBuildDate::class => [
            ValidValueFormat::class => ValidDatetime::class,
            AllowedParent::class    => [Channel::class],
        ],
        Category::class => [
            AllowedAttributes::class => ['domain'],
            AllowedParent::class     => [Channel::class, Item::class],
        ],
        Generator::class => [
            AllowedParent::class => [Channel::class],
        ],
        Docs::class => [
            ValidValueFormat::class => ValidURL::class,
            AllowedParent::class    => [Channel::class],
        ],
        Cloud::class => [
            AllowedParent::class => [Channel::class],
        ],
        Ttl::class => [

            ValidValueFormat::class => NaturalNoZero::class,
            AllowedParent::class    => [Channel::class],
        ],
        Image::class => [
            AllowedChildren::class => [
                Url::class,
                Title::class,
                Link::class,
                Width::class,
                Height::class,
                Description::class,
            ],
            RequiredChildren::class => [Url::class, Title::class, Link::class],
            AllowedParent::class    => [Channel::class, Item::class],
        ],
        Rating::class => [
            AllowedParent::class => [Channel::class],
        ],
        TextInput::class => [
            AllowedChildren::class  => [Title::class, Description::class, Name::class, Link::class],
            RequiredChildren::class => [Title::class, Description::class, Name::class, Link::class],
            AllowedParent::class    => [Channel::class],
        ],
        SkipHours::class => [
            AllowedParent::class => [Channel::class],
        ],
        SkipDays::class => [
            AllowedParent::class => [Channel::class],
        ],
        Name::class => [
            AllowedParent::class => [TextInput::class],
        ],
        Hour::class => [
            ValidValueFormat::class => [
                [
                    Interval::class, [
                        'min' => 0,
                        'max' => 23,
                    ],
                ],
                Natural::class,
            ],
            AllowedParent::class => [SkipHours::class],
        ],
        Day::class => [
            ValidValueFormat::class => [
                [InList::class, ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']],
            ],
            AllowedParent::class => [SkipDays::class],
        ],
        Enclosure::class => [
            AllowedParent::class => [Item::class],
        ],
    ];
}
