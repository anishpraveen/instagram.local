<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Hashing;
use App\Mail\AdminMail;
use App\Block;
use App\Posts;
use App\User;
use App\Map;
use Auth;
use Mail;

use Illuminate\Database\Eloquent\ModelNotFoundException;//find or fail error exception class.
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class AdminController extends Controller
{
    use Hashing;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
      * Show the admin dashboard.     
      * @return \Illuminate\Http\Response
      */
     public function index()
     { 
        return view('admin.dashboard');
     }


    /**
      * Show the home page of user.     
      * @return \Illuminate\Http\Response
      */
     public function user()
     { 
        return view('admin.users');
     }


    /**
      * Get user list.     
      * @return \Illuminate\Http\Response
      */
    public function getUserList($value = '')
    {
        $name = explode(' ', $value);
         if(empty($name[1]))
         {
             $name[1] = '';
         }
         $userList = User::select('*')->where('name','like','%'.$name[0].'%')->where('id','<>',auth()->user()->id)->where('id','<>',3)
                            ->where('lastname','like','%'.$name[1].'%')
                            ->orWhere('lastname','like','%'.$name[0].'%')->where('id','<>',auth()->user()->id)->where('id','<>',3)
                            ->sortable()->paginate(config('constants.PaginationAdmin'));

        return view('admin._user_list', compact('userList'));
    }

    /**
      * Show the post.     
      * @return \Illuminate\Http\Response
      */
     public function post()
     { 
        //  abort_if(auth()->user()->roles!='admin', 403,'403 Forbidden access');
        //  $userList = User::sortable()->paginate(5);
        //  redirect ('/home');
        return view('admin.posts');
     }

    /**
      * Get post list.     
      * @return \Illuminate\Http\Response
      */
    public function getPostList($value = '')
    { 
         $value = base64_decode($value);
         if(empty($value) || $value == ' ')
         {
             $postList = Posts::select('*') 
                            ->sortable()->paginate(config('constants.PaginationAdmin'));
         }
         else
         {
             $postList = Posts::select('*')->where('description','like','%'.$value.'%')              
                            ->sortable()->paginate(config('constants.PaginationAdmin'));
         }
         

        return view('admin._post_list', compact('postList'));
    }
    
    /**
      * Toggle roles of user     
      * @return string
      */
    public function toggleRole()
    {
        $id = request('id');
        $roles = request('option');
        if($roles == 'admin')
            $message = config('messages.new_admin');
        else
            $message = config('messages.del_admin');
        try
        {
            $user = User::FindOrFail($id);
            $user->roles = $roles;
            $user->save();
            return $message;
        }

        catch(ModelNotFoundException $err)
        {
            $message = config('messages.noUser');
            return $message;
        }
    }

    /**
      * Show reported stats
      * @return \Illuminate\Http\Response
      */
    public function report()
    {
         return view('admin.reports');
    }

    /**
      * Get report list.     
      * @return \Illuminate\Http\Response
      */
    public function getReportList($value = '')
    {
        $name = explode(' ', $value);
         if(empty($name[1]))
         {
             $name[1] = '';
         }
         $reportList = Block::select('*')
                            ->sortable()->paginate(config('constants.PaginationAdmin'));
        foreach ($reportList as $key => $value) 
        {
            $reportList[$key]['reporter_name'] = User::select('name')->where('id','=',$value['reporter_id'])->get()->toArray();
            $reportList[$key]['user_name'] = User::select('name')->where('id','=',$value['user_id'])->get()->toArray();
        }
        return view('admin._reports_list', compact('reportList'));
    }

    /**
      * Show mailing page
      * @return \Illuminate\Http\Response
      */
    public function mail()
    {
         return view('admin.mail');
    }

    /**
      * Show mailing page
      * @return \Illuminate\Http\Response
      */
    public function sendMail()
    {
        $to = request('to');
        $toCount = request('toCount');
        $subject = request('subject');
        $body = request('body');
        $from = auth()->user()->email;
        $message = 'mail send';
        $MailSend = true;
        $userList = User::all();
        $email = new AdminMail($from, $subject, $body);
        switch ($to) {
            case 'user':
                foreach ($userList as $user)
                {
                    if($user->roles == $to)
                        $emails[] = $user->email;
                }
                $message = 'to users';
                break;
            
            case 'admin':
                foreach ($userList as $user)
                {
                    if($user->roles == $to)
                        $emails[] = $user->email;
                }
                              
                $message = 'to admin';
                break;
            
            case 'all':
                foreach ($userList as $user)
                {
                    $emails[] = $user->email;
                }
                $message = 'to all';
                break;

            default:
                $MailSend = false;
                $message = 'invalid option';        
                break;
        }
        
        if($MailSend)
            Mail::to($emails)->queue($email);  
        return $message;
    }

    /**
      * Get email ids of users
      * @return json string
      */
    public function getEmails()
    {
        $search = request('q');
        $userList = User::all();
        $userList = User::select('*')
        ->where('email', 'like', '%'.$search.'%')
        ->get();
        $count = 0;
        // $emails[$count]['id'] = 1;
        // $emails[$count++]['text'] = $search;
        if(count($userList))
        {
            foreach ($userList as $user)
            {
                $emails[$count]['id'] = $user->id;
                $emails[$count++]['text'] = $user->email;
            }
        }
        else
        {
            $emails[$count]['id'] = '-1';
            $emails[$count++]['text'] = 'no result';
        }
        return ($emails);
    }
}
