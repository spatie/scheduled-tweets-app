<?php

namespace Tests\Unit\Models;

use App\Exceptions\CouldNotTweet;
use App\Models\ScheduledTweet;
use App\Services\Twitter\Facades\Twitter;
use Tests\TestCase;

class ScheduledTweetTest extends TestCase
{
    /** @var \App\Models\ScheduledTweet */
    protected $scheduledTweet;

    public function setUp()
    {
        parent::setUp();

        Twitter::fake();

        $this->scheduledTweet = factory(ScheduledTweet::class)->create([
            'scheduled_for' => now()->subDay(),
        ]);
    }

    /** @test */
    public function it_can_send_a_tweet()
    {
        $this->scheduledTweet->tweet();

        Twitter::assertTweeted($this->scheduledTweet->text, $this->scheduledTweet->account);
    }

    /** @test */
    public function it_will_not_tweet_a_tweet_that_was_already_tweeted()
    {
        $this->scheduledTweet->tweet();

        $this->expectException(CouldNotTweet::class);

        $this->scheduledTweet->tweet();
    }
}
