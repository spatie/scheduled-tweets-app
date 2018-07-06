<?php

use App\Models\ScheduledTweet;
use Faker\Generator as Faker;

$factory->define(ScheduledTweet::class, function (Faker $faker) {
    return [
        'account' => $faker->word,
        'text' => $faker->text,
        'scheduled_for' => $faker->dateTimeBetween('+1 day', '+ 10 days')
    ];
});
