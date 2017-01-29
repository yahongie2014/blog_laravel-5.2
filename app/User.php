<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
  {
    return $this->hasMany('App\Post','user_id');
  }
  
    public function comments()
  {
    return $this->hasMany('App\Comment','post_id');
  }

    public function likes()
    {
        return $this->belongsToMany('App\Post', 'likes', 'user_id', 'post_id');
    }
}
