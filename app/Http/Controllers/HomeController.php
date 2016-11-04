<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the profile.
     *
     * @return \Illuminate\Http\Response
     */
     public function profile()
    {   
        $user = User::Find(Auth::user()->id);
        $posts = $user->posts->toArray(); $posts= array_reverse($posts);
        //dd($posts);
        return view('pages.profile', compact('posts'));
    }

    /**
     * Show the user favourites.
     *
     * @return \Illuminate\Http\Response
     */
     public function favourites()
    {
        return view('pages.favourites');
    }

    /**
     * Show the user settings.
     *
     * @return \Illuminate\Http\Response
     */
     public function settings()
    {
        return view('pages.settings');
    }

    /**
     * Show the user search.
     *
     * @return \Illuminate\Http\Response
     */
     public function search()
    {
        return view('pages.search');
    }
}
