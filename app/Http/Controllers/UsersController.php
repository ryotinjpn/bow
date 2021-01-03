<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Post;
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

        return view('users.show', [
            'user'  => User::findOrFail($id), 
            'posts' => $posts
        ]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $path = Storage::disk('s3')->put('/', $$request->file('image'), 'public');
        
        $user = Auth::user([
            'name'    => $request->name,
            'email'   => $request->email,
            'profile' => $request->profile,
            'image'   => Storage::disk('s3')->url($path),
            'youtube' => $request->youtube,
        ]);
        $user->save();

        return redirect(url('users/edit'))->with('success', '保存しました。');
    }
}
