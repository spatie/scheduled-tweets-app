<?php

namespace App\Http\Controllers;

class ScheduledTweetsController extends Controller
{
    public function index()
    {
        return view('scheduled-tweets.index');
    }
}
