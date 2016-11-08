<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use App\Posts;
use App\User;
use Request;
use Auth;

class PostsController extends Controller
{
    /**
     * Show the user settings.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(PostRequest $request)
    {   
        $input =$request->all();
        //dd($input);
        $post = new Posts;
        $post->description=$input['description'];
        
        $post->userId=Auth::user()->id;

        //Uploading file
        $uploadFolder='uploads/posts/';
        if (Request::file('image')->isValid()) 
        {
            $destinationPath = public_path($uploadFolder);
            $extension = Request::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Request::file('image')->move($destinationPath, $fileName);
        }
        
        $post->imageName=$uploadFolder.$fileName;
        $post->mapId=Auth::user()->mapId;
        //dd($post);
        $post->save();
        $str = '<script type="text/javascript">alert("stored");</script>';
        echo $str;
        return redirect('/profile'); 
    }

    /**
    *
    *Get post
    *
    *
    */
    public function show($id){
        $post=Posts::find($id);
        //dd($post);
    }

    /**
    *
    *Get post
    *
    *
    */
    public function get(){
        $user = User::Find(Auth::user()->id);
        $followList=$user->follow->toArray();
        $posts = null;
        $count=0;
        foreach ($followList as $follow) 
        {
            $followUser = User::Find($follow['user_id']);
            $userPost = $followUser->posts->toArray();
            if($count==0)
            {
                $posts=$userPost;
                $count++;
            } 
            else{
                $posts = array_merge($posts,$userPost);
            }
            
        }   
        $posts = array_values(array_sort($posts, function ($value) {
            return $value['publishedOn'];
        }));

        
        //dd($user);
        $posts= array_reverse($posts);

        //dd($posts);
       // return $posts;
        return view('pages._posts', compact('posts'));
    }

}
