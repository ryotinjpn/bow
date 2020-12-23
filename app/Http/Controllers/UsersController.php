<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class UsersController extends Controller
{
    public function index(){
        $users = User::All()->shuffle();
        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        $posts = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('users.show', ['user' => User::findOrFail($id), 'posts' => $posts]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;

        $file = $request->file('image');
        $path = Storage::disk('s3')->put('/', $file, 'public');
        $user->image = Storage::disk('s3')->url($path);

        $user->youtube = $request->youtube;
        $user->save();

        return redirect(url('/users/edit'))->with('success', '保存しました。');
    }
}
