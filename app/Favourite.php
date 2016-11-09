<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'postId',
        'userId'
    ];

    /**
     * Posts are liked by user
     *
     * @return Belong relation
     */
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
