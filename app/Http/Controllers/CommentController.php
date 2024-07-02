<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post){

        request()->validate([
            'body' => 'required',
        ]);
        
        // $attributes ['post_id'] = $post->id;
        // $attributes ['user_id'] = auth()->user()->id;
        // Comment::create($attributes);
        //equ. to

        $post->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'Comment posted!');
    }
}
