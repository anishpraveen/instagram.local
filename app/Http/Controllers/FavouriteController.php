<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Posts;
use App\Favourite;
use App\Traits\Hashing;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Response;



class FavouriteController extends Controller
{
    use Hashing;
    /**
     * like a post with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $id = $this->decodeThisPost($id);
        $postExist = Posts::FindorFail($id);
        $like = new Favourite;
        $like->postId = $postExist->id;
        $like->userId = Auth::user()->id;
        
        $like->save();
        return ($like);
        
    }
    
    /**
     * Unlike a post with id = @param.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unlike($id)
    {
        $id = $this->decodeThisPost($id);
        $postExist = Posts::FindorFail($id);
        $like = new Favourite;
        $like->postId = $postExist->id;
        $like->userId = Auth::user()->id;
        
        $like = Favourite::where('postId', $postExist->id)
                         ->where('userId', Auth::user()->id)
                         ->delete(); 
       return ($like);

    }
}
