<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'name' => 'required|max:255',
            'password' => 'min:6|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]*$/',
            'image' => 'mimes:jpeg,bmp,png',
            
        ];
    }

    public function all()
    {
        $data = parent::all();
        // $data['email'] = trim($data['email']);
     
        return $data;
    }
}
