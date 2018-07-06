<?php

namespace App\Services\Twitter;

use PHPUnit\Framework\Assert as PHPUnit;

class FakeTwitter implements Twitter
{
    /** @var string */
    public $activeAccount = '';

    public $sentTweets = [];

    public function account(string $name): Twitter
    {
        $this->activeAccount = $name;

        return $this;
    }

    public function tweet(string $text)
    {
        $this->sentTweets[$this->activeAccount][] = $text;
    }

    public function assertTweeted(string $text, string $account)
    {
        PHPUnit::assertTrue(in_array($text, $this->sentTweets[$account] ?? []), "Tweet `{$text}` was not sent to `{$account}`");
    }

    public function assertNotTweeted(string $text, string $account)
    {
        PHPUnit::assertFalse(in_array($text, $this->sentTweets[$account] ?? []), "Tweet `{$text}` was sent to `{$account}`");
    }
}
