<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }

    public function favorite($id)
    {
        Favorite::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'You Favorited the Post.');

        return redirect()->back();
    }

    public function unfavorite($id)
    {
        $like = Favorite::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        session()->flash('success', 'You Unfavorited the Post.');

        return redirect()->back();
    }
}
