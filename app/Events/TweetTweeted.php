<?php

namespace App\Events;

use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TweetTweeted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var array */
    public $tweetId;

    public function __construct(Tweet $tweet)
    {
        echo 'broadcasting';

        $this->tweetId = $tweet->id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('tweets');
    }
}
