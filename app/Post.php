<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like_relationship;

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

    public function Like_relationships()
    {
      return $this->hasMany('App\Like_relationship');
    }

    public function like_by()
    {
      return Like_relationship::where('user_id', Auth::user()->id)->first();
    }
}
