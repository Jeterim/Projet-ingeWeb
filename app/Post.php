<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'potins';

    // testing
    public $fillable = ['user_id', 'content'];

    /**
     * Get the user that owns the Post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the comments for the blog Post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'potin_id');
    }
}
