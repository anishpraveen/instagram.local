<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];
    protected $table = 'mapLocation';

    /**
      * Get coordinates of given id
      * @return array of coordinates
      */
    public static function getLocation($id)
    {
        $location = Map::Find($id);
        $coordinates['latitude'] = $location['latitude'];
        $coordinates['longitude'] = $location['longitude'];
        $coordinates['name'] = $location['name'];
        return $coordinates;
    }
}
