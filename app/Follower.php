<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{   
    protected $fillable = [
        'user_id',
        'follower_id'
    ];
    /**
     * Follows
     *
     * @return Belong relation
     */
    public function follows()
    {
        return $this->belongsTo('App\User','user_id');
    }
    /**
     * Follows
     *
     * @return Belong relation
     */
    public function followers()
    {
        return $this->belongsTo('App\User','follower_id');
    }
}
