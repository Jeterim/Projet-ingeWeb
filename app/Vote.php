<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $primaryKey='potin_id';

    /**
     * Get the user that owns the vote.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post that owns the vote.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }


}
