<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;

class Post extends Model
{
    //
    protected $fillable = ['content','picture','user_id'];
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}
