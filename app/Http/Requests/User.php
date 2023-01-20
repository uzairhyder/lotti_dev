<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest
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
            //
            'password' => 'required|same:confirm_password',
            'address' => 'required|max:100',
            'contact' => 'required|max:40',
            'user_name'=>'required|unique:users,user_name',
            'email'=>'required|unique:users,email',
            'last_name'=>'required|max:50',
            'first_name'=>'required|max:50',

        ];
    }
    public function messages()
    {
        return[
            'password.required' => 'Password Field is required',
            'address.required' => 'Address Field is required',
            'contact.required' => 'Contact Field is required',
            'user_name.required' => 'User Name Field is required',
            'email.required' => 'Email Field is required',
            'last_name.required'=> 'Last Name Field is required',
            'first_name.required'=> 'First Name Field is required',
        ];
    }
}
