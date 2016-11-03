<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Posts;
use Request;
use Auth;

class PostsController extends Controller
{
    /**
     * Show the user settings.
     *
     * @return \Illuminate\Http\Response
     */
     public function store()
    {   
        $input =Request::all(); 
        $post = new Posts;
        $post->description=$input['description'];
        $post->imageName=$input['image'];
        $post->userId=Auth::user()->id;
        //dd($post);
        $post->save();
        $str = '<script type="text/javascript">alert("stored");</script>';
        echo $str;
        return redirect('/profile');
    }

}
