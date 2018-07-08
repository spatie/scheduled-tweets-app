<?php

Route::get('scheduled-tweets', 'ScheduledTweetsController@index');
Route::post('scheduled-tweets', 'ScheduledTweetsController@store');
Route::delete('scheduled-tweets/{scheduledTweet}', 'ScheduledTweetsController@delete');