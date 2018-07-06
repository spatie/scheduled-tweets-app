<?php

namespace App\Console\Commands;

use App\Models\ScheduledTweet;
use Illuminate\Console\Command;

class TweetScheduledTweetsCommand extends Command
{
    protected $signature = 'tweet-scheduled-tweets';

    protected $description = 'Tweet scheduled tweets';

    public function handle()
    {
        $this->info('Sending scheduled tweets...');

        $scheduledTweets = ScheduledTweet::notTweetedYet()->get()
            ->filter->shouldBeTweeted()
            ->each->tweet();

        $this->info('Tweeted ' . $scheduledTweets->count() . ' scheduled tweet(s)!');
    }
}
