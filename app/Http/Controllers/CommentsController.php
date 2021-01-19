<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Post;
use App\Model\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comment = new Comment([
            'text'    => $request->text,
            'user_id' => Auth::user()->id,
            'post_id' => $post->id,
        ]);
        $comment->save();

        return redirect('posts/' . $post->id);
    }
}
