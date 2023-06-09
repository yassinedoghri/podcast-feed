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

/**
 * @property Title $title
 * @property Description $description
 * @property Enclosure $enclosure
 * @property Guid $guid
 * @property Image $image
 * @property PubDate $pubDate
 * @property Link $link
 * @property Author $author
 * @property Category $category
 * @property Comments $comments
 * @property Source $source
 * @property ItunesAuthor $itunes_author
 * @property ItunesTitle $itunes_title
 * @property ItunesImage $itunes_image
 * @property ItunesSummary $itunes_summary
 * @property ItunesSubtitle $itunes_subtitle
 * @property ItunesKeywords $itunes_keywords
 * @property ItunesEpisodeType $itunes_episodeType
 * @property ItunesEpisode $itunes_episode
 * @property ItunesSeason $itunes_season
 * @property ItunesDuration $itunes_duration
 * @property ItunesExplicit $itunes_explicit
 * @property ItunesBlock $itunes_block
 * @property ContentEncoded $content_encoded
 * @property PodcastLocation $podcast_location
 * @property PodcastComments $podcast_comments
 * @property PodcastSocialInteract $podcast_social_interact
 * @property PodcastChapters $podcast_chapters
 * @property PodcastImages $podcast_images
 *
 * @property PodcastTranscript[] $podcast_transcripts
 * @property PodcastPerson[] $podcast_persons
 * @property PodcastValue[] $podcast_values
 */
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
