<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Follower;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailVerification;
use Carbon\Carbon;
use Request;
use Mail;
use DB;

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
            'password' => 'required|min:6|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]*$/',
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
        $token = str_random(30);
        $user=User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verification_token' => $token,
        ]); 
        //Uploading file
        if(!empty(Request::file('image')))
        {
            if (Request::file('image')->isValid()) 
            {
                $destinationPath = public_path(config('constants.profilePicPath'));
                $extension = Request::file('image')->getClientOriginalExtension();
                $fileName = uniqid().'.'.$extension;

                Request::file('image')->move($destinationPath, $fileName);
            }
            $user->profilePic='/'.config('constants.profilePicPath').''.$fileName;
        }
        
        $user->lastname = $data['lastname'];
        $user->birthday = $DOB;
        $user->gender = $data['gender'];
        $user->verification_token = $token;
        
        $user->save();

        $follow = new Follower;
        $follow->user_id = $user->id;
        $follow->follower_id = $user->id;
        
        $follow->save();
        $content = "Welcome ".$user->name." to our instagram family";
        Mail::send('emails.welcome', ['title' => 'Welcome', 'content' => $content], function($message) use ($data)
            {   
                //$actionText
                $message->from('no-reply@'.config('app.name'), config('app.name'));
                $message->subject("Welcome to ".config('app.name'));
                $message->to($data['email']);
                $message->priority('High');
            });
        return  $user;
    }

    /**
    *  Over-ridden the register method from the "RegistersUsers" trait
    *  Remember to take care while upgrading laravel
    */
    public function register(Request $request)
    {
        
        DB::beginTransaction();
        try
        {
            $user = $this->create(Request::all());
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['verification_token' => $user->verification_token]));
            Mail::to($user->email)->send($email);
            DB::commit();
            return back();
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back()->withErrors(['msg', 'Please check your inbox and verify your account']);;
        }
    }
    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        User::where('verification_token',$token)->firstOrFail()->verified();
        return redirect('login');
    }

}
