<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduledTweetResource extends JsonResource
{
    public function toArray($request)
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
