<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Atom\AtomLink;
use PodcastFeed\Tags\Itunes\ItunesAuthor;
use PodcastFeed\Tags\Itunes\ItunesBlock;
use PodcastFeed\Tags\Itunes\ItunesCategory;
use PodcastFeed\Tags\Itunes\ItunesComplete;
use PodcastFeed\Tags\Itunes\ItunesExplicit;
use PodcastFeed\Tags\Itunes\ItunesImage;
use PodcastFeed\Tags\Itunes\ItunesKeywords;
use PodcastFeed\Tags\Itunes\ItunesNewFeedUrl;
use PodcastFeed\Tags\Itunes\ItunesOwner;
use PodcastFeed\Tags\Itunes\ItunesSubtitle;
use PodcastFeed\Tags\Itunes\ItunesSummary;
use PodcastFeed\Tags\Itunes\ItunesType;
use PodcastFeed\Tags\Podcast\PodcastBlock;
use PodcastFeed\Tags\Podcast\PodcastComplete;
use PodcastFeed\Tags\Podcast\PodcastFunding;
use PodcastFeed\Tags\Podcast\PodcastGuid;
use PodcastFeed\Tags\Podcast\PodcastId;
use PodcastFeed\Tags\Podcast\PodcastImages;
use PodcastFeed\Tags\Podcast\PodcastLiveItem;
use PodcastFeed\Tags\Podcast\PodcastLocation;
use PodcastFeed\Tags\Podcast\PodcastLocked;
use PodcastFeed\Tags\Podcast\PodcastMedium;
use PodcastFeed\Tags\Podcast\PodcastPerson;
use PodcastFeed\Tags\Podcast\PodcastPreviousUrl;
use PodcastFeed\Tags\Podcast\PodcastSocial;
use PodcastFeed\Tags\Podcast\PodcastValue;
use PodcastFeed\Tags\Tag;

/**
 * @property Item[] $items
 * @property Title $title
 * @property Link $link
 * @property Language $language
 * @property Copyright $copyright
 * @property LastBuildDate $lastBuildDate
 * @property Category $category
 * @property Generator $generator
 * @property Image $image
 * @property Category $itunes_category
 * @property ItunesExplicit $itunes_explicit
 * @property ItunesAuthor $itunes_author
 * @property ItunesOwner $itunes_owner
 * @property ItunesType $itunes_type
 * @property ItunesNewFeedUrl $itunes_newFeedUrl
 * @property ItunesBlock $itunes_block
 * @property ItunesComplete $itunes_complete
 */
class Channel extends Tag
{
    protected const NAME = 'channel';

    protected array $_allowedParents = [Rss::class];

    protected array $_allowedChildren = [
        AtomLink::class,
        Category::class,
        Cloud::class,
        Copyright::class,
        Description::class,
        Docs::class,
        Generator::class,
        Image::class,
        Item::class,
        ItunesAuthor::class,
        ItunesBlock::class,
        ItunesCategory::class,
        ItunesComplete::class,
        ItunesExplicit::class,
        ItunesImage::class,
        ItunesNewFeedUrl::class,
        ItunesOwner::class,
        ItunesSubtitle::class,
        ItunesSummary::class,
        ItunesType::class,
        Language::class,
        LastBuildDate::class,
        Link::class,
        ManagingEditor::class,
        ItunesKeywords::class,
        PodcastMedium::class,
        PodcastImages::class,
        PodcastBlock::class,
        PodcastComplete::class,
        PodcastLiveItem::class,
        PodcastFunding::class,
        PodcastGuid::class,
        PodcastId::class,
        PodcastLocation::class,
        PodcastLocked::class,
        PodcastPerson::class,
        PodcastPreviousUrl::class,
        PodcastSocial::class,
        PodcastValue::class,
        PubDate::class,
        Rating::class,
        SkipDays::class,
        SkipHours::class,
        TextInput::class,
        Title::class,
        Ttl::class,
        WebMaster::class,
    ];

    protected array $_requiredChildren = [
        Title::class,
        Link::class,
        Description::class,
        Language::class,
        ItunesImage::class,
        ItunesCategory::class,
        ItunesExplicit::class,
    ];

    protected array $_recommendedChildren = [ItunesAuthor::class, Link::class, ItunesOwner::class];
}
