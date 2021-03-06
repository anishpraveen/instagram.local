<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Notifications\Messages\MailMessage;
//use Illuminate\Http\Request;
use App\Mail\AccountDeleted;
use App\Mail\AccountBlocked;
use App\Mail\AccountUnblocked;
use App\Http\Requests\UserRequest;
use App\Traits\Hashing;
use App\Block;
use App\User;
use App\Map;
use Request;
use Mail;
use Auth;
use Hash;

class UserController extends Controller
{
    use Hashing;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['checkEmail','checkPassword']]);
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
        //$user->email = $request['email'];
        if(!empty($request['password']))
        {
            $user->password = bcrypt($request['password']);
             Mail::send('emails.passwordReset', ['title' => 'Password Changed', 'content' => 'Your password has been been successfully reset'], function ($message)
            {
                $message->to(Auth::user()->email);
                $message->subject('Password Changed');
                $message->priority('High');
            });
        }
        

        $input =$request->all();
        //Uploading file
        $uploadFolder='/'.config('constants.profilePicPath');
        if (!empty(Request::file('image')) && Request::file('image')->isValid()) 
        {
            $destinationPath = public_path($uploadFolder);
            $extension = Request::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Request::file('image')->move($destinationPath, $fileName);
            $user->profilePic='/'.config('constants.profilePicPath').''.$fileName;
            //dd('added');
        }
        $user->save();
        flash(config('constants.editSuccess'), 'success');
        return redirect('/settings');
    }

    /**
     * Save User location
     *
     * @return void
     */
    public function storeLocation()
    {
        Request::json();
        $json_url = Request::get('url');
        $json = file_get_contents($json_url);
        $data = json_decode($json, TRUE);
        $mapLocation = new Map;
        if($data['status'] == 'OK')
        {
            $place = null;
            $locationId = null;
            $selectPlaceIndex =config('constants.placeIndex');
            $selectResultPlace = config('constants.firstIndex');
            $user = User::Find(Auth::user()->id);
            foreach ($data as $key) {
                $place = $key;
                break;
            }
            
            $mapLocation->latitude = Request::get('latitude');
            $mapLocation->longitude = Request::get('longitude');
            $mapLocation->name = $place[$selectPlaceIndex]['formatted_address'];
            $mapLocation->place_id = $place[$selectPlaceIndex]['place_id'];

            $lat = round($mapLocation->latitude, 4);
            $lng = round($mapLocation->longitude, 4);

            

            $mapId = Map::select('*')->where('place_id','like',$place[$selectPlaceIndex]['place_id'])
                                //->where('longitude','like',$lng.'%')
                                ->get()->toArray();
            
            if(empty($mapId))
            {
                $mapLocation->save();
                $locationId = $mapLocation->id;
            }
            else
            {
                $locationId = $mapId[$selectResultPlace]['id'];
            }
            $user->mapId = $locationId;
            $user->save();
            $mapLocation->status = $data['status'];

            return $mapLocation;
            //return $place[2]['place_id'];
        }
        $mapLocation->status = $data['status'];
        return $mapLocation;
        
    }

    /**
     * Check if email available and valid
     *
     * @return data
     */
    public function checkEmail()
    {
        $data[] = null;
        if (!preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/", Request::get('email'))) 
        {       
            $data['message'] = 'Invalid email format'; 
            $data['status'] = 'taken';            
            return $data;  
        }
        $validEmail = User::select('*')->where('email','=',Request::get('email'))->get()->toArray();
        $data['status'] = 'availabe';
        $data['message'] = 'The email is availabe.';
        if(count($validEmail))
        {
            $data['message'] = 'The email is taken. Please login or use forget password.';            
            $data['status'] = 'taken';            
            return $data;
        }
        return $data;
    }

    /**
     * Check password strength
     *
     * @return data
     */
    public function checkPassword()
    {
        $data[] = null;
        if (!preg_match("/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[^a-zA-Z]).{6,}$/", Request::get('password'))) 
        {       
            $data['message'] = 'Need atleast 6 characters including uppercase, lowercase and a digit'; 
            $data['status'] = 'invalid';            
            return $data;  
        }
        $data['message'] = 'Valid password'; 
        $data['status'] = 'Valid';            
        return $data;  
    }

    /**
     * Block a user
     *
     * @return data
     */
    public function block()
    {
        
        if(auth()->user()->roles!='admin')
        {
            $message = config('messages.unauthorized');
            return $message;
        }
        $id = Request::get('id');
        try
        {
            $user = User::FindOrFail($id);
            $user->blocked = 'true';
            $user->save();
            $message = config('messages.blocked');
            $email = new AccountBlocked($user);
            Mail::to($user->email)->queue($email);
            return $message;
        }

        catch(ModelNotFoundException $err)
        {
            $message = config('messages.noUser');
            return $message;
        }

    }

    /**
     * Unblock a user
     *
     * @return data
     */
    public function unblock()
    {
        if(auth()->user()->roles!='admin')
        {
            $message = config('messages.unauthorized');
            return $message;
        }
        $id = Request::get('id');
        try
        {
            $user = User::FindOrFail($id);
            $user->blocked = 'false';
            $user->save();
            $message = config('messages.unblocked');
            $email = new AccountUnblocked($user);
            Mail::to($user->email)->queue($email);
            return $message;
        }

        catch(ModelNotFoundException $err)
        {
            $message = config('messages.noUser');
            return $message;
        }

    }

    /**
     * Delete a user
     *
     * @return data
     */
    public function delete()
    {
        if(auth()->user()->roles!='admin')
        {
            $message = config('messages.unauthorized');
            return $message;
        }
        $id = Request::get('id');
        try
        {
            $user = User::FindOrFail($id);
            $message = config('messages.account_deleted');
            $email = new AccountDeleted($user);
            Mail::to($user->email)->queue($email);
            $user->delete();           
            return $message;
        }

        catch(ModelNotFoundException $err)
        {
            $message = config('messages.noUser');
            return $message;
        }

    }

    /**
     * Delete a user
     *
     * @return data
     */
    public function report()
    {
        $id = Request::get('id');
        $id=$this->decodeThis($id);
        $comment = Request::get('message');
        $block = new Block;
        $block->reporter_id = Auth::user()->id;
        $block->user_id = $id;
        $block->comment = $comment;
        try 
        {
            $block->save();
            $user = User::FindOrFail($id);
            $user->block_counter++;
            $user->save();
        } 
        catch ( \Illuminate\Database\QueryException $e) 
        {
            if($e->errorInfo[0]=='23000')
            {
                return 'already reported';
            }
        }
        $message = config('messages.user_reported');
        return $message;
    }
}
