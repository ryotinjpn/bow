<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = new Comment(['text'=> $request->text]);
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->save();
        return redirect()->action('PostsController@show', $post);
    }
}
