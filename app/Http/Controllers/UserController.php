<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\Messages\MailMessage;
//use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Map;
use Request;
use Mail;
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
        $place = null;
        $locationId = null;
        $selectPlaceIndex =2;
        $selectResultPlace = 0;
        $user = User::Find(Auth::user()->id);
        foreach ($data as $key) {
            $place = $key;
            break;
        }

        $mapLocation = new Map;
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

        return $locationId;
        //return $place[2]['place_id'];
        
    }
}
