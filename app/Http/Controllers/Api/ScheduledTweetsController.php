<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ScheduledTweetResource;
use App\Models\ScheduledTweet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ScheduledTweetsController extends Controller
{
    public function index()
    {
        $scheduledTweets = ScheduledTweet::orderBy('scheduled_for')->get();

        return ScheduledTweetResource::collection($scheduledTweets);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account' => 'required',
            'text' => 'required|max:250',
            'scheduledFor' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $scheduledTweet = ScheduledTweet::create([
            'account' => $validated['account'],
            'text' => $validated['text'],
            'scheduled_for' => $validated['scheduledFor'],
        ]);


        return new ScheduledTweetResource($scheduledTweet);
    }

    public function delete(ScheduledTweet $scheduledTweet)
    {
        $scheduledTweet->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
