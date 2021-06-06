<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blog');
    }

    public function create()
    {
        return Inertia::render('CreateBlog');
    }

    public function store(Request $request)
    {
        dd($request);
        $validate = $request->validate([
            'user_id' => ['required'],
            'title' => ['required', 'min:5', 'bail'],
            'body' => ['required', 'min:10', 'bail'],
            'image_url' => ['required'],
        ]);
        Post::create($validate);
        return Redirect::route('home');
    }
}
