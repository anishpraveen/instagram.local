<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follower;

class FollowController extends Controller
{
    /**
     * Follow a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function follow($id)
    {
        $userExist = User::FindorFail($id);
        $follow = new Follower;
        $follow->user_id = $userExist->id;
        $follow->follower_id = Auth::user()->id;
        
        $follow->save();
        dd($follow);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $followList = $user->follow->toArray();
        var_dump($followList);
    }

    /**
     * Unfollow a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($id)
    {
        $userExist = User::FindorFail($id);
        $follow = new Follower;
        $follow->user_id = $userExist->id;
        $follow->follower_id = Auth::user()->id;
        
        $follow = Follower::where('user_id', $userExist->id)
                            ->where('follower_id', Auth::user()->id)
                            ->delete(); 
       dd($follow);

    }

    

    
}
