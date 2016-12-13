<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Carbon\Carbon;
use App\Traits\Hashing;
use App\Posts;
use App\User;
use App\Map;
use Request;
use Hashids;
use Auth;
use File;

class PostsController extends Controller
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
     * Add new post of user.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(PostRequest $request)
    {   
        $input =$request->all();
        $post = new Posts;
        $post->description=$input['description'];        
        $post->userId=Auth::user()->id;

        //Uploading file
        $uploadFolder=config('constants.postsPath');
        if (Request::file('image')->isValid()) 
        {
            $destinationPath = public_path($uploadFolder);
            $extension = Request::file('image')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            Request::file('image')->move($destinationPath, $fileName);
        }
        
        $post->imageName=$uploadFolder.$fileName;
        $post->mapId=Auth::user()->mapId;
        $post->save();
        return redirect('/edit/'.$post->id);
    }

    /**
    *
    *Get post
    *@param $id
    *
    */
    public function show($id)
    {
        $post=Posts::find($id);
    }

    /**
     *
     *Get posts of users being followed
     *
     *@return view 
     */
    public function get()
    {
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
            else
            {
                $posts = array_merge($posts,$userPost);
            }
            
        }   
        $posts = array_values(array_sort($posts, function ($value) {
            return $value['publishedOn'];
        }));
        $userLikePosts = $user->like->toArray();
        $posts = $this->addLocation($posts);
        $posts = $this->getLikePosts($posts,$userLikePosts);
        
        $posts= array_reverse($posts);

        return view('pages._posts', compact('posts'));
    }

     /**
      * Get posts like status 
      * @return array of items(posts)
      */
     public function getLikePosts($posts,$userLikePosts)
     {
         $arrayIndex = 0;
         $arrayIndex2 = 0;
         foreach ($posts as $key ) 
         {  
             foreach ($userLikePosts as $key2) 
             {
                 if($key2['postId'] == $key['id'])
                 {
                     $posts[$arrayIndex]['like'] = true;
                     break;
                 }
                 else
                 {
                     $posts[$arrayIndex]['like'] = false;
                 }
             }
             if(empty($userLikePosts))
             {
                 $posts[$arrayIndex]['like'] = false;
             }
             $arrayIndex++;
         }
          
         return $posts;
     }

     /**
      * Add location coordinates to given posts list
      * @return array of items(posts)
      */
    public function addLocation($posts)
    {
        $arrayIndex = 0; 
        foreach ($posts as $key) 
        {
            $coordinates =$this->getLocation($posts[$arrayIndex]['mapId']);
            $posts[$arrayIndex]['latitude'] = $coordinates['latitude'];
            $posts[$arrayIndex]['longitude'] = $coordinates['longitude'];
            $posts[$arrayIndex]['locationName'] = $coordinates['name'];
            $arrayIndex++;
        }
       return ($posts);
    }

    /**
      * Get coordinates of given id
      * @return array of coordinates
      */
    public function getLocation($id)
    {
        $location = Map::Find($id);
        $coordinates['latitude'] = $location['latitude'];
        $coordinates['longitude'] = $location['longitude'];
        $coordinates['name'] = $location['name'];
        return $coordinates;
    }

    /**
      * View edit post page
      * @return \Illuminate\Http\Response
      */
    public function viewEditPost($id)
    {
        $id=(Hashids::decode($id)); 
        if(count($id))
            $id=$id[0];
        else
        {   
            $message = config('constants.noPost');
            return view('errors.404',compact('message'));
        }
        $post = Posts::FindorFail($id);
        $user = User::Find(Auth::user()->id); 
        if($user->id!=$post->userId)
        {
            return redirect('/profile');
        }
        return view('pages.crop', compact('post'));
    }

    /**
      * Save edit post 
      * @return int
      */
    public function savePostEdits()
    {  
        Request::json();
        $user = User::Find(Auth::user()->id); 
        $post = Posts::Find(Request::get('id'));
        $post->description = Request::get('text'); 
        if($user->id!=$post->userId)
        {
            return 'invalid user';
        }
        $data = Request::get('base64');
        $post->save();
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        //$file = 'uploads/'. uniqid() . '.png';
        $file = Request::get('location');
        $success = file_put_contents($file, $data);

        return($success);        
    }

    /**
      * View edit post page
      * @return \Illuminate\Http\Response
      */
    public function deletePost($id)
    {        
        $id = $this->decodeThisPost($id);
        $post = Posts::FindorFail($id);
        $user = User::Find(Auth::user()->id); 
        if($user->id==$post->userId)
        {   
            $destinationPath = public_path($post->imageName);
            File::delete($destinationPath);
            $post->delete();
            return redirect()->back();
        }
        //return view('pages.crop', compact('post'));
        return redirect('/home');
    }


}
