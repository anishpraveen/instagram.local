<?php namespace App\Traits;

use Hashids;
trait Hashing
{
    public function decodeThis($id)
    {
        //echo "Hashing Trait executed";
        $id=(Hashids::decode($id)); 
        if(count($id))
        { 
            $id = $id[0];
            return $id;
        }
        //dd($id);
        return -1;
    }

    public function encodeThis($id)
    {
        $id = Hashids::encode($id);
        return ($id);
    }
    public function encodeThisArrayId($arr)
    {
        $count = 0;
        foreach ($arr as $key ) {
            $arr[$count]['id'] = Hashids::encode($arr[$count]['id'] );
            $count++;
        }
        return($arr);
    }
    

    public function decodeThisPost($id)
    {
        $id=(Hashids::decode($id)); 
        if(count($id))
            $id=$id[0];
        else
        {   
            $message = config('constants.noPost');
            return view('errors.404',compact('message'));
        }
        return $id;
    }
}