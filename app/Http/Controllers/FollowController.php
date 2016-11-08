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
        //dd($follow);
        $follow->save();
        dd($follow);
        //return redirect('/home');
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
     * Follow a user with id = @param.
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
        //dd($follow);
        $follow = Follower::where('user_id', $userExist->id)
                            ->where('follower_id', Auth::user()->id)
                            ->delete(); 
        
        //$follow->destroy($follow->id);
       dd($follow);
        //return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
