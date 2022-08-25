<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class personalProfile extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'password'=>'min:8|required_with:repassword',
            'repassword'=>'min:8|same:password',
            'profile_resume'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'password.required'=>'Password is required',
            'repassword.required'=>'Confirm password is required',
            'profile_resume.required'=>'Resume is required'
        ];
    }
}
