<?php

namespace Tests\Unit\Commands;

use App\Models\Tweet;
use App\Services\Twitter\Facades\Twitter;
use Tests\TestCase;

class SendScheduledTweetsCommandTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        Twitter::fake();
    }

    /** @test */
    public function it_will_tweet_schedule_tweets_that_should_be_tweeted_and_have_not_been_tweeted_yet()
    {
        $shouldBeTweeted = factory(Tweet::class)->create([
            'scheduled_for' => now()->subMinute(),
        ]);

        $futureTweet = factory(Tweet::class)->create([
            'scheduled_for' => now()->addMinute(),
        ]);

        $alreadyTweeted = factory(Tweet::class)->create([
            'tweeted_at' => now(),
        ]);

        $this->artisan('tweet-scheduled-tweets');

        Twitter::assertTweeted($shouldBeTweeted->text, $shouldBeTweeted->account);
        Twitter::assertNotTweeted($futureTweet->text, $futureTweet->account);
        Twitter::assertNotTweeted($alreadyTweeted->text, $alreadyTweeted->account);
    }
}
