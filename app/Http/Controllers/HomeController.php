<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Post;
use Storage;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::All()->random(5);
        $posts = Post::latest()->get();
        
        return view('home', [
            'user' => $user,
            'users' => $users,
            'posts' => $posts
        ]);
    }
}
