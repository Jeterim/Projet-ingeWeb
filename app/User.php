<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo','nom', 'prenom', 'email', 'password', 'credits',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    /**
     * Get the posts for the user.
     */
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the votes for the user.
     */
    public function votes()
    {
        return $this->hasMany('App\Vote', 'user_id');
    }

    /**
     * Get the posts for the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }
  
    /**
     * Get the notifications for the user.
     */
    public function notifications()
    {
        return $this->hasMany('App\Notification', 'user_id');
    }
}
