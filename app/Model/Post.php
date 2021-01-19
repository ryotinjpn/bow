<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Model\Like;

class Post extends Model
{
    protected $fillable = [
      'content',
      'picture',
      'user_id',
    ];

    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Model\Like', 'post_id');
    }

    public function favorites()
    {
        return $this->hasMany('App\Model\Favorite', 'post_id');
    }

    public static function getAuthId()
    {
        return  Auth::id();
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function getFavorites()
    {
        return $this->favorites;
    }

    public function isLikedByAuthUser() :bool
    {
        $id = self::getAuthId();
        $likes = $this->getLikes();
        return $likes->contains('user_id', $id);
    }

    public function isFavoritedByAuthUser() :bool
    {
        $id = self::getAuthId();
        $favorites = $this->getFavorites();
        return $favorites->contains('user_id', $id);
    }
}
