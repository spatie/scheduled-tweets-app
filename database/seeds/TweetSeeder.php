<?php

use App\Models\Tweet;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    public function run()
    {
        factory(Tweet::class, 20)->create();
    }
}
