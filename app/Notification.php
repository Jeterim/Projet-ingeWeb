<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * Get the user that owns the Notification
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
