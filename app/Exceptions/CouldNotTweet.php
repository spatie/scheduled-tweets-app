<?php

namespace App\Exceptions;

use App\Models\Tweet;
use Exception;

class CouldNotTweet extends Exception
{
    public static function tweetWasAlreadySent(Tweet $tweet)
    {
        return new static("Could not send tweet `{$tweet->text}` to `{$tweet->account}` because the tweet was already sent at {$tweet->tweeted_at->format('Y-m-d H:i:s')}");
    }
}
