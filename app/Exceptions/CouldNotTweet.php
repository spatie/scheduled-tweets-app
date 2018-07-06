<?php

namespace App\Exceptions;

use App\Models\ScheduledTweet;
use Exception;

class CouldNotTweet extends Exception
{
    public static function tweetWasAlreadySent(ScheduledTweet $scheduledTweet)
    {
        return new static("Could not send tweet `{$scheduledTweet->text}` to `{$scheduledTweet->account}` because the tweet was already sent at {$scheduledTweet->tweeted_at->format('Y-m-d H:i:s')}");
    }
}
