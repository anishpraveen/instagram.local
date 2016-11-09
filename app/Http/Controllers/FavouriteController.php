<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Posts;
use App\Favourite;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Response;



class FavouriteController extends Controller
{
    /**
     * like a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $postExist = Posts::FindorFail($id);
        $like = new Favourite;
        $like->postId = $postExist->id;
        $like->userId = Auth::user()->id;
        
        $like->save();
        dd($like);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Response $request)
    {
        $user = Auth::user();
        $likeList = $user->like->toArray();

        
        foreach ($likeList as $key ) {
            $postId = $key['postId'];
            $post[] = Posts::Find($postId)->toArray();
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
        
        return view('pages.pagenation', ['posts' => $paginatedSearchResults]);
    

        //dd($col);
    }

    /**
     * Unlike a user with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unlike($id)
    {
        $postExist = Posts::FindorFail($id);
        $like = new Favourite;
        $like->postId = $postExist->id;
        $like->userId = Auth::user()->id;
        
        $like = Favourite::where('postId', $postExist->id)
                            ->where('userId', Auth::user()->id)
                            ->delete(); 
       dd($like);

    }
}
