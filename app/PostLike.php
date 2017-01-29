<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike  extends Model {

    protected $table = 'post_like';

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }

}