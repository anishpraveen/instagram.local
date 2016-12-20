<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Map;

class Posts extends Model
{
    use Sortable;
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

    public $sortable = [
        'id', 'description', 'userId', 'created_at', 'updated_at', 'publishedOn'
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

    /**
      * Add location coordinates to given posts list
      * @return array of items(posts)
      */
    public static function addLocation($posts)
    {
        $arrayIndex = 0; 
        foreach ($posts as $key) 
        {
            $coordinates = Map::getLocation($posts[$arrayIndex]['mapId']);
            $posts[$arrayIndex]['latitude'] = $coordinates['latitude'];
            $posts[$arrayIndex]['longitude'] = $coordinates['longitude'];
            $posts[$arrayIndex]['locationName'] = $coordinates['name'];
            $arrayIndex++;
        }
       return ($posts);
    }

    /**
      * Get posts and check if its liked or not
      *
      * @param posts and likedPosts
      * @return array of items(posts)
      */
     public static function getLikePosts($posts,$userLikePosts)
     {
         $arrayIndex = 0;
         $arrayIndex2 = 0;
         if(empty($userLikePosts))
         {
             $userLikePosts[] = array();
             $userLikePosts[0]['postId'] = config('constants.NoPostsExist');  
         }
         foreach ($posts as $key ) 
         {
             foreach ($userLikePosts as $key2) 
             {
                 if($key2['postId'] == $key['id'])
                 {
                     $posts[$arrayIndex]['like'] = true;
                     break;
                 }
                 else
                 {
                     $posts[$arrayIndex]['like'] = false;
                 }
             }
             $arrayIndex++;
         }
         return $posts;
     }

}
