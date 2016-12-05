<?php

namespace App;

use Auth;
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

    /**
      * Get User Recomendation List
      * @return userList array
      */
     public function getUserRecomendation()
     {   
        $userDisplayCount = config('constants.userDisplayCount');
        // get fixed list 
        //$userList = User::select('*')->where('id','<>',Auth::user()->id)->limit($userDisplayCount)->offset(0)->get()->toArray(); 
        
        //get random users
        $userList = User::orderByRaw('RAND()')->take($userDisplayCount)->where('id','<>',Auth::user()->id)->get()->toArray(); 
        $userList = $this->getFollowStatus($userList);
        
        return $userList;
     }
     
     /**
      * Get the user follow status 
      * @param  $userList (array of users)
      * @return $userList (follow field added)
      */
     public static function getFollowStatus($userList)
     {
        $user = User::Find(Auth::user()->id);
        $userFollow = $user->follow->toArray();
        $arrayIndex = 0;
        $idList = array();
        foreach ($userFollow as $key) 
        {
            $idList[] =  $userFollow[$arrayIndex]['user_id'];
            $arrayIndex++;
        }
        
        $arrayIndex = 0;
        //Follow status of each user in the suggestion list 
        foreach ($userList as $key ) 
        {   
            $coordinates = Map::getLocation($key['mapId']);
            $userList[$arrayIndex]['location'] = $coordinates['name']; 
            if(array_search($userList[$arrayIndex]['id'],$idList))
            {
                $userList[$arrayIndex]['follow'] = true;
            }
            else
            {
                 $userList[$arrayIndex]['follow'] = false;
            }
             $arrayIndex++;
        }
        $arrayIndex = 0;
        //Follow status of first user in the follow list 
        if(isset($idList) && !empty($idList[0]))
        {
            foreach ($userList as $key ) 
            {
                if($userList[$arrayIndex]['id']==$idList[0])
                {
                    $userList[$arrayIndex]['follow'] = true;
                }
                $arrayIndex++;
            }
        }

        return $userList;
     }

     /**
      * Get the details of user.  
      * @param user   
      * @return user (user array filled with location,follower,follow details)
      */
     public function getUserDetails($user)
     {
         $coordinates = Map::getLocation($user->mapId);
         $user['latitude'] = $coordinates['latitude'];
         $user['longitude'] = $coordinates['longitude'];
         $user['locationName'] = $coordinates['name'];
         $follow = $user->follow->toArray();
         $followers = $user->followers->toArray();
         $user['follow'] = count($follow);
         $user['followers'] = count($followers);

         return $user;
     }
}
