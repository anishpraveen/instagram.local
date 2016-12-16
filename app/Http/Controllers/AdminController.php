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
    }

    /**
      * Show the home page of user.     
      * @return \Illuminate\Http\Response
      */
     public function index()
     { 
         abort_if(auth()->user()->roles!='admin', 403,'403 Forbidden access');
         $userList = User::sortable()->paginate(5);
        //  redirect ('/home');
        return view('admin.users', compact('userList'));
     }
}
