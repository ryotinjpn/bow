<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id)
    {
        $posts = Post::where('user_id', $id) ->orderBy('created_at', 'desc')->get();; 
        return view('users.show', ['user' => User::findOrFail($id), 'posts' => $posts]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }
}
