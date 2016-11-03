<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = [
        'imageName',
        'userId',
        'mapId',
        'description',
        'publishedOn'
    ];
}
