<?php

declare(strict_types=1);

namespace PodcastFeed\Tags\RSS;

use PodcastFeed\Tags\Content\ContentEncoded;
use PodcastFeed\Tags\Itunes\ItunesAuthor;
use PodcastFeed\Tags\Itunes\ItunesBlock;
use PodcastFeed\Tags\Itunes\ItunesDuration;
use PodcastFeed\Tags\Itunes\ItunesEpisode;
use PodcastFeed\Tags\Itunes\ItunesEpisodeType;
use PodcastFeed\Tags\Itunes\ItunesExplicit;
use PodcastFeed\Tags\Itunes\ItunesImage;
use PodcastFeed\Tags\Itunes\ItunesKeywords;
use PodcastFeed\Tags\Itunes\ItunesSeason;
use PodcastFeed\Tags\Itunes\ItunesSubtitle;
use PodcastFeed\Tags\Itunes\ItunesSummary;
use PodcastFeed\Tags\Itunes\ItunesTitle;
use PodcastFeed\Tags\Podcast\PodcastChapters;
use PodcastFeed\Tags\Podcast\PodcastComments;
use PodcastFeed\Tags\Podcast\PodcastImages;
use PodcastFeed\Tags\Podcast\PodcastLocation;
use PodcastFeed\Tags\Podcast\PodcastPerson;
use PodcastFeed\Tags\Podcast\PodcastSocialInteract;
use PodcastFeed\Tags\Podcast\PodcastTranscript;
use PodcastFeed\Tags\Podcast\PodcastValue;
use PodcastFeed\Tags\Tag;

class Item extends Tag
{
    protected const NAME = 'item';

    protected bool $_multiple = true;

    protected ?string $_plural = 'items';

    protected array $_allowedParents = [Channel::class];

    protected array $_allowedChildren = [
        Title::class,
        Description::class,
        Enclosure::class,
        Guid::class,
        Image::class,
        PubDate::class,
        Link::class,
        Image::class,
        Author::class,
        Category::class,
        Comments::class,
        Source::class,
        ItunesAuthor::class,
        ItunesTitle::class,
        ItunesImage::class,
        ItunesSummary::class,
        ItunesSubtitle::class,
        ItunesKeywords::class,
        ItunesEpisodeType::class,
        ItunesEpisode::class,
        ItunesSeason::class,
        ItunesDuration::class,
        ItunesExplicit::class,
        ItunesBlock::class,
        ContentEncoded::class,
        PodcastLocation::class,
        PodcastComments::class,
        PodcastSocialInteract::class,
        PodcastTranscript::class,
        PodcastChapters::class,
        PodcastPerson::class,
        PodcastValue::class,
        PodcastImages::class,
    ];

    protected array $_requiredChildren = [Title::class, Enclosure::class];

    protected array $_recommendedChildren = [
        Guid::class,
        PubDate::class,
        Description::class,
        ItunesDuration::class,
        Link::class,
        ItunesImage::class,
        ItunesExplicit::class,
    ];
}
