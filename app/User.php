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
        'name', 'email', 'password', 'lastName', 'birthday', 'gender', 'profilePic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * User has many posts
     *
     * @return Has many relation
     */
    public function posts()
    {
        return $this->hasMany('App\Posts','userId');
    }

    /**
     * Follows
     *
     * @return Belong relation
     */
    public function follow()
    {
        return $this->hasMany('App\Follower','follower_id');
    }

    /**
     * Followers
     *
     * @return Belong relation
     */
    public function followers()
    {
        return $this->hasMany('App\Follower','user_id');
    }
}
