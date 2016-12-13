<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Posts;
use Auth;
use Hash;
use App\Map;
use Hashids;
use App\Traits\Hashing;

use Illuminate\Database\Eloquent\ModelNotFoundException;//find or fail error exception class.
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
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
        $mapList = array();
        $user = User::Find(Auth::user()->id);
        $followList=$user->follow->toArray();
        $posts = null;
        $arrayIndex = 0;
        $userLikePosts = $user->like->toArray();

        // Get all post of the followers
        foreach ($followList as $follow) 
        {
            $followUser = User::Find($follow['user_id']);
            $userPost = $followUser->posts->toArray();           
            if($arrayIndex==0)
            {
                $posts=$userPost;
                $arrayIndex++;
            } 
            else{
                $posts = array_merge($posts,$userPost);
            }
            
        }       
        
        // Get suggestion list
        $userList = $user->getUserRecomendation();
        $userList = $this->encodeThisArrayId($userList);
        if(is_null($posts))
        {
            return view('user.home', compact('posts'), compact('userList'));
        }
        $posts = array_values(array_sort($posts, function ($value) {
                return $value['publishedOn'];
            }));

        $posts = Posts::addLocation($posts);
        $posts = Posts::getLikePosts($posts,$userLikePosts);
        
        $posts= array_reverse($posts);
        $posts = $this->encodeThisArrayId($posts);
        $perPage = config('constants.PaginationPageSize');
        $posts =$this->paginateArray($posts,$perPage);
        return view('user.home', compact('posts'), compact('userList'));
     }

     /**
      * Show the profile of current user.     
      * @return \Illuminate\Http\Response
      */
     public function profile()
     {   
        $user = User::Find(Auth::user()->id); 
        $user = $user->getUserDetails($user);
        $posts = $this->getPosts($user);
        return view('pages.profile', compact('posts'), compact('user'));
     }

     /**
      * Show the profile of requested user. 
      * @param id    
      * @return \Illuminate\Http\Response
      */
     public function viewProfile($id)
     {   
        $id=$this->decodeThis($id);
        try
        {
            $user = User::FindOrFail($id);
            $user = $user->getUserDetails($user);
            $currentUser = User::Find(Auth::user()->id); 
            $posts = $this->getPosts($user);
            return view('pages.profile', compact('posts'), compact('user'));
        }

        catch(ModelNotFoundException $err)
        {
            $message = config('constants.noUser');
            return view('errors.404',compact('message'));
        }
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
        $post = Posts::addLocation($post);
        $post = Posts::getLikePosts($post,$userLikePosts);
        
        $post= array_reverse($post);
        $post = $this->encodeThisArrayId($post);
        $perPage = config('constants.PaginationPageSize');
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
      * @param value (string) 
      * @return \Illuminate\Http\Response
      */
     public function search($value = '')
     {   
         $name = explode(' ', $value);
         if(empty($name[1]))
         {
             $name[1] = '';
         }
         $userList = User::select('*')->where('name','like','%'.$name[0].'%')
                            ->where('lastname','like','%'.$name[1].'%')
                            ->orWhere('lastname','like','%'.$name[0].'%')                            
                            ->get()->toArray();
         $userList = User::getFollowStatus($userList);  
         $userList = $this->encodeThisArrayId($userList); 
         $perPage = config('constants.PaginationPageSize');
         $userList =$this->paginateArray($userList,$perPage); 
         $pageHeading = 'Search Results';
         return view('pages.search', compact('userList'), compact('pageHeading'));
     }     

     /**
      * Show the user followers.  
      * @param value (string) 
      * @return \Illuminate\Http\Response
      */
     public function followers($id)
     {
         try
         {
            $user = User::FindOrFail($id);
            $followers = $user->followers->toArray();
            $userList;
            foreach ($followers as $key ) 
            {
                $userList[] = User::FindOrFail($key['follower_id']);
            }
            $userList = User::getFollowStatus($userList);
            $userList = $this->encodeThisArrayId($userList);   
            $perPage = config('constants.PaginationPageSize');
            $userList =$this->paginateArray($userList,$perPage); 
            $pageHeading = $user->name.' is followed by';
            return view('pages.search', compact('userList'), compact('pageHeading'));
         }
        
        catch(ModelNotFoundException $err)
        {
            return view('errors.404');
        }
     }

     /**
      * Show the user following list.  
      * @param value (string) 
      * @return \Illuminate\Http\Response
      */
     public function following($id)
     {
         try
         {
            $user = User::FindOrFail($id);
            $follow = $user->follow->toArray();
            $userList;
            foreach ($follow as $key ) 
            {
                $userList[] = User::FindOrFail($key['user_id']);
            }
            $userList = User::getFollowStatus($userList);   
            $userList = $this->encodeThisArrayId($userList);
            $perPage = config('constants.PaginationPageSize');
            $userList =$this->paginateArray($userList,$perPage); 
            $pageHeading = $user->name.' is following';
            return view('pages.search', compact('userList'), compact('pageHeading'));
         }
        
        catch(ModelNotFoundException $err)
        {
            return view('errors.404');
        }
     }

     /**
      * Paginate Array   
      * @return paginated object
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
      * Get the posts of user.     
      * @return posts (paginated posts array)
      */
     public function getPosts($user)
     {   
        $posts = $user->posts->toArray(); 
        $posts= array_reverse($posts);
        $currentUser = User::Find(Auth::user()->id);
        $userLikePosts = $currentUser->like->toArray();
        $posts = Posts::addLocation($posts);
        $posts = Posts::getLikePosts($posts,$userLikePosts);
        
        $posts = $this->encodeThisArrayId($posts);
        $perPage = config('constants.PaginationPageSize');
        $posts =$this->paginateArray($posts,$perPage);
        return $posts;
     }

     
     
}
