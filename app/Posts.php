<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imageName',
        'userId',
        'mapId',
        'description',
        'publishedOn'
    ];
    protected $dates = ['publishedOn'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',  
    ];

    /**
     * Posts are owned by a user
     *
     * @return Belong relation
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
