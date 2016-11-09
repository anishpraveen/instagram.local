<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'follower_id'
    ];
    /**
     * User follows
     *
     * @return Belong relation
     */
    public function follows()
    {
        return $this->belongsTo('App\User','user_id');
    }
    /**
     * User is being followed
     *
     * @return Belong relation
     */
    public function followers()
    {
        return $this->belongsTo('App\User','follower_id');
    }
}
