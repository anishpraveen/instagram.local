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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mapList = array();
        $user = User::Find(Auth::user()->id);
        $followList=$user->follow->toArray();
        $posts = null;
        $count = 0;
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
        //dd($posts);
        // Get suggestion list
        $userList = $this->getUserRecomendation();

        if(is_null($posts)){
            return view('user.home', compact('posts'), compact('userList'));
        }
        $posts = array_values(array_sort($posts, function ($value) {
            return $value['publishedOn'];
        }));

        
        //dd($user);
        $posts= array_reverse($posts);
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
        
        foreach ($likeList as $key ) {
            $postId = $key['postId'];
            $post[] = Posts::Find($postId)->toArray();
        }
        if( empty($post))
        {   //dd(!is_null($post));
            return view('pages.favourites',['posts' => null]);
        }
        //dd($post);
        //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($post);

        //Define how many items we want to be visible in each page
        $perPage = 4;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

        return view('pages.favourites',['posts' => $paginatedSearchResults]);
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
     public function search()
    {
        return view('pages.search');
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
     * Show the map.   
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

}
