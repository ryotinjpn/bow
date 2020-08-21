<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(PostRequest $request)
    {
        $comment = new Comment();
        $comment->save();
        return redirect('/');
    }
}
