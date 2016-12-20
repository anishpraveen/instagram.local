<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Hashing;
use App\Posts;
use App\User;
use App\Map;
use Auth;

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
         $userList = User::select('*')->where('name','like','%'.$name[0].'%')
                            ->where('lastname','like','%'.$name[1].'%')
                            ->orWhere('lastname','like','%'.$name[0].'%')                            
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
      * Get user list.     
      * @return \Illuminate\Http\Response
      */
    public function getPostList($value = '')
    { $value = base64_decode($value);
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
}
