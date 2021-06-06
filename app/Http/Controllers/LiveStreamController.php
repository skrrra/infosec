<?php

namespace App\Http\Controllers;

use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class LiveStreamController extends Controller
{

//        $client_id = 'w5y4irh1e88i6z58uq4nywpvoszkra';
//        $client_secret = 'a68kzktdxu6yny82lkephxwkr49h7i';
//        $access_token = '66t9s4nytko50glgz1ruhc9b5qye4k';

    public function liveHackers()
    {
        $users = Social::whereNotNull('twitch')->get('twitch')->pluck('twitch');

        //retreiving live streams
        $response = Http::withHeaders(['Client-ID' => 'w5y4irh1e88i6z58uq4nywpvoszkra'])
            ->withToken('66t9s4nytko50glgz1ruhc9b5qye4k')
            ->baseUrl("https://api.twitch.tv/helix")
            ->get('/streams', [
                'user_login' =>
                    $users->shuffle()->toArray()
                ,
                'first' => '6',
        ]);

        // retreiving live streamer avatar
        $img = Http::withHeaders(['Client-ID' => 'w5y4irh1e88i6z58uq4nywpvoszkra'])
            ->withToken('66t9s4nytko50glgz1ruhc9b5qye4k')
            ->baseUrl("https://api.twitch.tv/helix")
            ->get('/users', [
                'login' =>
                    $users->shuffle()->toArray()
                ,
                'profile_image_url' => '6',
        ]);

        if (!$response->ok()) {
            return 'Unable to retrieve live streams!';
        }

        $informations = $response->json(['data']);
        $avatar = $img->json(['data']);

        $streamInfo = collect($informations)->keyBy('user_name')->toArray();
        $avatarInfo = collect($avatar)->keyBy('display_name')->toArray();
        $liveChannels = array_merge_recursive($streamInfo, $avatarInfo);

        return Inertia::render('Home', [
            'liveChannels' => $liveChannels,
        ]);
    }
}
