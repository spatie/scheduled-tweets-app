<?php

namespace App\Services\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use Log;

class RealTwitter implements Twitter
{
    /** @var \Abraham\TwitterOAuth\TwitterOAuth  */
    protected $twitterApi;

    public function account(string $name): Twitter
    {
        $twitterApi = new TwitterOAuth(
            config("services.twitter.{$name}.consumer_key"),
            config("services.twitter.{$name}.consumer_secret"),
            config("services.twitter.{$name}.access_token"),
            config("services.twitter.{$name}.access_token_secret")
        );

        $this->twitterApi = $twitterApi;
    }

    public function tweet(string $status)
    {
        if (! app()->environment('production')) {
            Log::info("Tweeting {$status}");

            return;
        }

        return $this->twitterApi->post('statuses/update', compact('status'));
    }
}
