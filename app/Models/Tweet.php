<?php

namespace App\Models;

use App\Events\TweetTweeted;
use App\Exceptions\CouldNotTweet;
use App\Services\Twitter\Facades\Twitter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public $guarded = [];

    public $casts = [
        'tweeted_at' => 'datetime',
        'scheduled_for' => 'datetime',
    ];

    public function shouldBeTweeted(): bool
    {
        if ($this->wasAlreadyTweeted()) {
            return false;
        }

        return $this->scheduled_for->isPast();
    }

    public function tweet()
    {
        if ($this->wasAlreadyTweeted()) {
            throw CouldNotTweet::tweetWasAlreadySent($this);
        }

        Twitter::account($this->account)->tweet($this->text);

        event(new TweetTweeted($this));

        $this->markAsTweeted();
    }

    protected function wasAlreadyTweeted(): bool
    {
        return ! is_null($this->tweeted_at);
    }

    protected function markAsTweeted()
    {
        $this->update(['tweeted_at' => now()]);
    }

    public function scopeNotTweetedYet(Builder $builder)
    {
        $builder->whereNull('tweeted_at');
    }
}
