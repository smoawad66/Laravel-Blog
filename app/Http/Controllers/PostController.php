<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        // dd([request()->getQueryString(),request()->getRequestUri()]);
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(9),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'isFavourite' => auth()->user()->favourites->contains($post->id),
        ]);
    }

    public function update(Post $post)
    {
        auth()->user()->favourites()->toggle($post->id);
        return back();
    }

    public function favourite()
    {
        return view('posts.index', [
            'posts' => auth()->user()->favourites()->paginate(9),
        ]);
    }
}
