<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostCommentsController extends Controller
{
    public function store(Post $post){

        request()->validate([
            'body' => ['required']
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Your comment has been posted!');
    }
}
