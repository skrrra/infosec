<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class HackerController extends Controller
{
    public function index()
    {
        $users = Social::whereNotNull('twitch')->get('twitch')->pluck('twitch');

        //retreiving live streams
        $response = Http::withHeaders(['Client-ID' => 'w5y4irh1e88i6z58uq4nywpvoszkra'])
            ->withToken('66t9s4nytko50glgz1ruhc9b5qye4k')
            ->baseUrl("https://api.twitch.tv/helix")
            ->get('/users', [
                'login' =>
                    $users->toArray()
        ]);

        $test = $response->json(['data']);
        return Inertia::render('Hackers',[
            'test' => $test
        ]);
    }
}
