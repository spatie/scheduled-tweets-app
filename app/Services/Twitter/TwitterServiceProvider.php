<?php

namespace App\Services\Twitter;

use Illuminate\Support\ServiceProvider;

class TwitterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Twitter::class, RealTwitter::class);
    }
}
