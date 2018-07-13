<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'account' => $this->account,
            'text' => $this->text,
            'scheduledFor' => $this->scheduled_for,
            'tweetedAt' => $this->tweeted_at,
        ];
    }
}
