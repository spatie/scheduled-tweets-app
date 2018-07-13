<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetResource;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('scheduled_for')->get();

        return TweetResource::collection($tweets);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account' => 'required',
            'text' => 'required|max:250',
            'scheduledFor' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $tweet = Tweet::create([
            'account' => $validated['account'],
            'text' => $validated['text'],
            'scheduled_for' => $validated['scheduledFor'],
        ]);

        return new TweetResource($tweet);
    }

    public function delete(Tweet $tweet)
    {
        $tweet->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
