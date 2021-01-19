<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Model\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Model\Comment');
    }

    public function Likes()
    {
        return $this->hasMany('App\Model\Like');
    }

    public function favorites()
    {
        return $this->hasMany('App\Model\Favorite', 'post_id');
    }
}
