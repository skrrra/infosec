<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $posts = User::find(1)->posts()->with('users')->orderByDesc('id')->get();
        return Inertia::render('Blog', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return Inertia::render('CreateBlog');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => ['required'],
            'title' => ['required', 'min:5', 'bail'],
            'body' => ['required', 'min:10', 'bail'],
            'image_url' => ['required'],
        ]);
        Post::create($validate);
        return Redirect::route('home');
    }

    public function edit(Post $post)
    {
        $post = $post->get();
        dd($post);
    }

    public function update()
    {

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return Redirect::route('blog');
    }

}
