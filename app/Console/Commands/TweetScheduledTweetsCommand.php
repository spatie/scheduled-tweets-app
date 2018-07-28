<?php

namespace App\Console\Commands;

use App\Models\Tweet;
use Illuminate\Console\Command;

class TweetScheduledTweetsCommand extends Command
{
    protected $signature = 'tweet-scheduled-tweets';

    protected $description = 'Tweet scheduled tweets';

    public function handle()
    {
        $this->info('Sending scheduled tweets...');

        $tweets = Tweet::notTweetedYet()->get()
            ->filter->shouldBeTweeted()
            ->each->tweet();

        $tweets = Tweet::get()->each->tweet();

        $this->info('Tweeted ' . $tweets->count() . ' scheduled tweet(s)!');
    }
}
