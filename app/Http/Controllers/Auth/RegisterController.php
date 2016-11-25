<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Follower;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required',
            'DOBYear' => 'required|not_in:Year',
            'DOBMonth' => 'required|not_in:Month',
            'DOBDay' => 'required|min:1|max:31|not_in:Day',
            'image' => 'mimes:jpeg,bmp,png',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $DOB=$data['DOBYear'].'-';
        $DOB.=$data['DOBMonth'].'-';
        $DOB.=$data['DOBDay'];
        $DOB=Carbon::createFromFormat('Y-m-d', $DOB);
        if ($DOB !== false) {
            
        }
        else{
            return false;
        }
        //Uploading file
        if (Request::file('image')->isValid()) 
        {
            $destinationPath = public_path(config('constants.profilePicPath'));
            $extension = Request::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Request::file('image')->move($destinationPath, $fileName);
        }
        
        $user=User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->lastname = $data['lastname'];
        $user->birthday = $DOB;
        $user->gender = $data['gender'];
        
        $user->profilePic='/'.config('constants.profilePicPath').''.$fileName;
        $user->save();

        $follow = new Follower;
        $follow->user_id = $user->id;
        $follow->follower_id = $user->id;
        
        $follow->save();

        return  $user;
    }
}
