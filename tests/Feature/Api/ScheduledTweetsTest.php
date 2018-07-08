<?php

namespace Tests\Feature\Api;

use App\Models\ScheduledTweet;
use Tests\TestCase;

class ScheduledTweetsTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->logIn();

        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_list_all_scheduled_tweets()
    {
        factory(ScheduledTweet::class, 10)->create();

        $this
            ->getJson('/api/scheduled-tweets')
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');
    }

    /** @test */
    public function it_can_create_a_scheduled_tweet()
    {
        $scheduledTweetAttributes = [
            'account' => 'testAccount',
            'text' => 'text tweet',
            'scheduledFor' => now()->addHour()->format('Y-m-d H:i:s'),
        ];

        $this
            ->postJson('/api/scheduled-tweets', $scheduledTweetAttributes)
            ->assertSuccessful()
            ->assertJsonFragment($scheduledTweetAttributes);
    }

    /** @test */
    public function it_can_delete_a_scheduled_tweet()
    {
        $scheduledTweet = factory(ScheduledTweet::class)->create();

        $this
            ->deleteJson("/api/scheduled-tweets/{$scheduledTweet->id}")
            ->assertSuccessful();

        $this->assertCount(0, ScheduledTweet::get());
    }
}
