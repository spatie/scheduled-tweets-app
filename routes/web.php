<?php

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', 'ScheduledTweetsController@index');
});
