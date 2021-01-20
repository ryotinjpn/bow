<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Favorite;
use Auth;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['favorite', 'unfavorite']);
    }

    public function favorite($id)
    {
        Favorite::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unfavorite($id)
    {
        $like = Favorite::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
}
