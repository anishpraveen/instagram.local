<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use Auth;
use Hash;
use App\Map;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

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
      * Show the profile.     
      * @return \Illuminate\Http\Response
      */
     public function index()
     {   
        $mapList = array();
        $user = User::Find(Auth::user()->id);
        $followList=$user->follow->toArray();
        $posts = null;
        $count = 0;
        $userLikePosts = $user->like->toArray();

        // Get all post of the followers
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
        
        // Get suggestion list
        $userList = $this->getUserRecomendation();

        if(is_null($posts)){
            return view('user.home', compact('posts'), compact('userList'));
        }
        $posts = array_values(array_sort($posts, function ($value) {
            return $value['publishedOn'];
        }));

        $posts = $this->getLikePosts($posts,$userLikePosts);
        
        $posts= array_reverse($posts);
        //dd($posts);
        $perPage = 6;
        $posts =$this->paginateArray($posts,$perPage);
        return view('user.home', compact('posts'), compact('userList'));
     }

     /**
      * Show the profile.     
      * @return \Illuminate\Http\Response
      */
     public function profile()
     {   
        $user = User::Find(Auth::user()->id);
        $posts = $user->posts->toArray(); $posts= array_reverse($posts);
        //dd($posts);
        $userLikePosts = $user->like->toArray();
        $posts = $this->getLikePosts($posts,$userLikePosts);
        
        $perPage = 6;
        $posts =$this->paginateArray($posts,$perPage);
        return view('pages.profile', compact('posts'));
     }

     /**
      * Show the user favourites.
      * @return \Illuminate\Http\Response
      */
     public function favourites()
     {
        $user = Auth::user();
        $likeList = $user->like->toArray();
        $post =null;
        
        foreach ($likeList as $key ) 
        {
            $postId = $key['postId'];
            $post[] = Posts::Find($postId)->toArray();
        }
        if( empty($post))
        {  
            return view('pages.favourites',['posts' => null]);
        }

        $post = array_values(array_sort($post, function ($value) {
            return $value['publishedOn'];
        }));
        $userLikePosts = $user->like->toArray();

        $post = $this->getLikePosts($post,$userLikePosts);
        
        $post= array_reverse($post);
        $perPage = 6;
        $posts =$this->paginateArray($post,$perPage);
        
        return view('pages.favourites',['posts' => $posts]);
     }

     /**
      * Show the user settings.
      * @return \Illuminate\Http\Response
      */
     public function settings()
     {
         return view('pages.settings');
     }

     /**
      * Show the user search.   
      * @return \Illuminate\Http\Response
      */
     public function search($value)
     {   
         $name = explode(' ', $value);
         if(empty($name[1]))
         {
             $name[1] = '';
         }
         $userList = User::select('*')->where('name','like','%'.$name[0].'%')
                            ->where('lastname','like','%'.$name[1].'%')->get()->toArray();
        //do not forget to optimise code 
        //this one and the function getUserRecomendation

                                            $user = User::Find(Auth::user()->id);
                                            $userFollow = $user->follow->toArray();
                                            $count = 0;
                                            $idList = array();
                                            foreach ($userFollow as $key) {
                                                $idList[] =  $userFollow[$count]['user_id'];
                                                $count++;
                                            }
                                            
                                            $mapList = $this->getMap();
                                            $count = 0;
                                            //Follow status of each user in the suggestion list 
                                            foreach ($userList as $key ) 
                                            {
                                                $userList[$count]['location'] = $mapList[$key['mapId']]; 
                                            // dd($userList[$count]['id']);
                                                if(array_search($userList[$count]['id'],$idList)){
                                                    $userList[$count]['follow'] = true;
                                                }
                                                else{
                                                    $userList[$count]['follow'] = false;
                                                }
                                                $count++;
                                            }
                                            $count = 0;
                                            //Follow status of first user in the follow list 
                                            if(isset($idList) && !empty($idList[0]))
                                            {
                                                foreach ($userList as $key ) {
                                                    if($userList[$count]['id']==$idList[0]){
                                                        $userList[$count]['follow'] = true;
                                                    }
                                                    $count++;
                                                }
                                            }



         //dd($userList);
         //return ('vv');
        return view('pages.search', compact('userList'));
     }

     /**
      * Get User Recomendation   
      * @return \Illuminate\Http\Response
      */
     public function getUserRecomendation()
     {   
        $count = 0;
        //$user = User::all()->toArray();
        $userList = User::select('*')->limit(15)->offset(0)->get()->toArray();
        
        $user = User::Find(Auth::user()->id);
        $userFollow = $user->follow->toArray();
        $idList = array();
        foreach ($userFollow as $key) {
            $idList[] =  $userFollow[$count]['user_id'];
            $count++;
        }
        
        $mapList = $this->getMap();
        $count = 0;
        //Follow status of each user in the suggestion list 
        foreach ($userList as $key ) 
        {
            $userList[$count]['location'] = $mapList[$key['mapId']]; 
          // dd($userList[$count]['id']);
            if(array_search($userList[$count]['id'],$idList)){
                $userList[$count]['follow'] = true;
            }
            else{
                 $userList[$count]['follow'] = false;
            }
             $count++;
        }
        $count = 0;
        //Follow status of first user in the follow list 
        if(isset($idList) && !empty($idList[0]))
        {
            foreach ($userList as $key ) {
                if($userList[$count]['id']==$idList[0]){
                    $userList[$count]['follow'] = true;
                }
                $count++;
            }
        }

        return $userList;
     }

     /**
      * Get the map details.   
      * @return \Illuminate\Http\Response
      */
     public function getMap()
     {   
        $map = Map::all()->toArray();
        $mapList = array();
        foreach ($map as $m) {
            $mapList[$m['id']] =  $m['name'] ;
        }
        //dd($mapList);
        return $mapList;
     }

     /**
      * Paginate Array   
      * @return \Illuminate\Http\Response
      */
     public function paginateArray($post,$perPage)
     {
         //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($post);

        //Define how many items we want to be visible in each page
        //$perPage = 6;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return $paginatedSearchResults;
     }

     /**
      * Get posts like status 
      * @return array of items(posts)
      */
     public function getLikePosts($posts,$userLikePosts)
     {
         $arrayIndex = 0;
         $arrayIndex2 = 0;
         if(empty($userLikePosts)){
             $userLikePosts[] = array();
             $userLikePosts[0]['postId'] = '-1';
             //dd($userLikePosts);
         }
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
             $arrayIndex++;
         }

         return $posts;
     }
}
