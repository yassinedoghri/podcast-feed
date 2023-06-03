<?php

declare(strict_types=1);

namespace PodcastFeed;

use Exception;
use PodcastFeed\Tags\RSS\Channel;
use SimpleXMLElement;

class PodcastFeed
{
    public Channel $channel;

    public function __construct(string $feedURL)
    {
        $feed = new SimpleXMLElement($feedURL, 0, true);

        if (! $feed->channel[0] instanceof SimpleXMLElement) {
            throw new Exception('<channel> tag is missing.');
        }

        $this->channel = new Channel('channel', $feed->channel[0]);
    }
}
