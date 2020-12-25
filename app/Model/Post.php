<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;

class Post extends Model
{
  protected $fillable = [
    'content',
    'picture',
    'user_id',
  ];

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function likes()
  {
    return $this->hasMany('App\Like', 'post_id');
  }

  public function favorites()
  {
    return $this->hasMany('App\Favorite', 'post_id');
  }

  public function isLikedByAuthUser()
  {
    $id = Auth::id();

    $likers = array();
    foreach ($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    }
    else {
      return false;
    }
  }

  public function isFavoritedByAuthUser()
  {
    $id = Auth::id();

    $favoriters = array();
    foreach ($this->favorites as $favorite) {
      array_push($favoriters, $favorite->user_id);
    }

    if (in_array($id, $favoriters)) {
      return true;
    }
    else {
      return false;
    }
  }
}
