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
        'password', 'remember_token', 'created_at', 'updated_at',  
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
     * User follows many 
     *
     * @return Belong relation
     */
    public function follow()
    {
        return $this->hasMany('App\Follower','follower_id');
    }

    /**
     * User is followed by many
     *
     * @return Belong relation
     */
    public function followers()
    {
        return $this->hasMany('App\Follower','user_id');
    }

    /**
     * User likes many posts
     *
     * @return Belong relation
     */
    public function like()
    {
        return $this->hasMany('App\Favourite','userId');
    }
}
