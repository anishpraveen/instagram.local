<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Request;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Save User Details
     *
     * @return void
     */
    public function save(UserRequest $request)
    {   
        $user = User::FindOrFail(Auth::user()->id);
        $name = explode(' ', $request['name']);
         if(empty($name[1]))
         {
             $name[1] = '';
         }
        $user->name = $name[0];
        $user->lastName = $name[1];
        $user->email = $request['email'];
        $user->password = $request['password'];

        $input =$request->all();
        //Uploading file
        $uploadFolder='/uploads/profilePic/';
        if (!empty(Request::file('image')) && Request::file('image')->isValid()) 
        {
            $destinationPath = public_path($uploadFolder);
            $extension = Request::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Request::file('image')->move($destinationPath, $fileName);
            $user->profilePic='/uploads/profilePic/'.$fileName;
            //dd('added');
        }
        else dd('no image');
        //dd($user);
        $user->save();
        return redirect('/settings');
    }
}
