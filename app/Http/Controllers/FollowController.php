<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follower;
use App\Traits\Hashing;

class FollowController extends Controller
{
    use Hashing;
    /**
     * Follow a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function follow($id)
    {
        $id=$this->decodeThis($id);
        $userExist = User::FindorFail($id);
        $follow = new Follower;
        $follow->user_id = $userExist->id;
        $follow->follower_id = Auth::user()->id;
        
        $follow->save();
        return ($follow);
        
    }
    
    /**
     * Unfollow a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($id)
    {
        $id=$this->decodeThis($id);
        $userExist = User::FindorFail($id);
        $follow = new Follower;
        $follow->user_id = $userExist->id;
        $follow->follower_id = Auth::user()->id;
        
        $follow = Follower::where('user_id', $userExist->id)
                          ->where('follower_id', Auth::user()->id)
                          ->delete(); 
       return ($follow);

    }

    

    
}
