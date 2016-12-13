<?php namespace App\Traits;

use Hashids;
trait Hashing
{
    public function decodeThis($id)
    {
        //echo "Hashing Trait executed";
        $id=(Hashids::decode($id)); 
        if(count($id))
            $id=$id[0];
        else
        {   
            $message = config('constants.noUser');
            return view('errors.404',compact('message'));
        }
        //dd($id);
        return $id;
    }

    public function encodeThis($id)
    {
        Hashids::encode($id);
        dd($id);
    }
}