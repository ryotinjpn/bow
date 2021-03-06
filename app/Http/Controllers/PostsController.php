<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class PostsController extends Controller
{
    public function store(PostRequest $request)
    {
        $path = Storage::disk('s3')->put('/', $request->file('picture'), 'public');

        Post::create([
            'content' => $request->content,
            'picture' => Storage::disk('s3')->url($path),
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/');
    }

    public function show($id)
    {
        return view('posts.show', [
            'post' => Post::find($id),
        ]);
    }
}
