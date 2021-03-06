<?php
namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

//use App\Social;
use Mail;
use App\User;
use App\Follower;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
   /**
     * Redirect to validation 
     * if valid provider
     *
     * @return 
     */
    public function getSocialRedirect( $provider )
    {
        $providerKey = Config::get('services.' . $provider);
        if (empty($providerKey)) 
        {
            return view('pages.status')
                ->with('error','No such provider');
        } 
        return Socialite::driver( $provider )->redirect();
    }

    /**
     * Get social details 
     *
     * @return 
     */
    public function getSocialHandle( $provider )
    {
        if (Input::get('error')=='access_denied') 
        {
            flash('You did not share your profile data with our app. Allow permission to login to our app again.', 'danger');
            return redirect()->route('login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');
        }
        $user = Socialite::driver( $provider )->user();
        $socialUser = null;
        
        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();
        $email = $user->email;
        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }
        if (!empty($userCheck)) 
        {
            $socialUser = $userCheck;
        }
        else 
        {
            // multiple login with different social accounts
            $sameSocialId =null;// Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first(); 
            if (empty($sameSocialId)) 
            {
                //There is no combination of this social id and provider, so create new one
                $newSocialUser = new User;
                $newSocialUser->email = $email;
                $name = explode(' ', $user->name);
                if (count($name) >= 1) {
                    $newSocialUser->name = $name[0];
                }
                if (count($name) >= 2) {
                    $newSocialUser->lastname = $name[1];
                }
                $newSocialUser->profilePic=$user->avatar;
                $newSocialUser->password = bcrypt(str_random(16));
                $newSocialUser->remember_token = str_random(64);
                if(empty($user['gender']))
                {
                    $user['gender'] = 'male';
                }
                $newSocialUser->gender=$user['gender'];
                $newSocialUser->save();   
                $follow = new Follower;
                $follow->user_id = $newSocialUser->id;
                $follow->follower_id = $newSocialUser->id;
                
                $follow->save();               
                $socialUser = $newSocialUser;
                $content = "Welcome ".$socialUser->name." to our instagram family";
                Mail::send('emails.welcome', ['title' => 'Welcome', 'content' => $content], function($message) use ($newSocialUser)
                    {   
                        $message->from('no-reply@'.config('app.name'), config('app.name'));
                        $message->subject("Welcome to ".config('app.name'));
                        $message->to($newSocialUser->email);
                        $message->priority('High');
                    });
            }
            else 
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
                
            }
        }
        auth()->login($socialUser);
        return redirect()->route('login');
        
    }
}