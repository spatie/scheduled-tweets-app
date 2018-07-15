<?php

namespace App\Events;

use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetTweeted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var array */
    protected $tweet;

    public function __construct(Tweet $tweet)
    {
        $this->tweet = (new TweetResource($tweet))->toArray();
    }

    public function broadcastOn()
    {
        return new PrivateChannel('tweets');
    }
}
