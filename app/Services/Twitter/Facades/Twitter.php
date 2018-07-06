<?php

namespace App\Services\Twitter\Facades;

use App\Services\Twitter\FakeTwitter;
use App\Services\Twitter\Twitter as TwitterInterface;
use Illuminate\Support\Facades\Facade;

class Twitter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TwitterInterface::class;
    }
    public static function fake()
    {
        $fakeTwitter = new FakeTwitter();

        static::swap($fakeTwitter);
    }
}
