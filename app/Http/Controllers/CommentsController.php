<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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