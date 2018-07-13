<?php

Route::get('tweets', 'TweetsController@index');
Route::post('tweets', 'TweetsController@store');
Route::delete('tweets/{tweet}', 'TweetsController@delete');
