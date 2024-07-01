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
        ]);
    }

    public function update(Post $post)
    {
        $post->favourite = !$post->favourite;
        $post->save();

        return back();
    }

    public function favourite()
    {
        return view('posts.index', [
            'posts' => Post::where('user_id', auth()->id())->where('favourite', true)->paginate(9),
        ]);
    }
}
