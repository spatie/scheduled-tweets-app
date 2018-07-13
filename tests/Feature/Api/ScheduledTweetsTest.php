<?php

namespace Tests\Feature\Api;

use App\Models\Tweet;
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
        factory(Tweet::class, 10)->create();

        $this
            ->getJson('/api/tweets')
            ->assertSuccessful()
            ->assertJsonCount(10, 'data');
    }

    /** @test */
    public function it_can_create_a_scheduled_tweet()
    {
        $tweetAttributes = [
            'account' => 'testAccount',
            'text' => 'text tweet',
            'scheduledFor' => now()->addHour()->format('Y-m-d H:i:s'),
        ];

        $this
            ->postJson('/api/tweets', $tweetAttributes)
            ->assertSuccessful()
            ->assertJsonFragment($tweetAttributes);
    }

    /** @test */
    public function it_can_delete_a_scheduled_tweet()
    {
        $tweet = factory(Tweet::class)->create();

        $this
            ->deleteJson("/api/tweets/{$tweet->id}")
            ->assertSuccessful();

        $this->assertCount(0, Tweet::get());
    }
}
