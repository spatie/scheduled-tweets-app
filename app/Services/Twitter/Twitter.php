<?php

namespace App\Services\Twitter;

interface Twitter
{
    public function account(string $name): Twitter;

    public function tweet(string $text);
}
