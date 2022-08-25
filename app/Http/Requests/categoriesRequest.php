<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoriesRequest extends FormRequest
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
            'cat_name'=>'required|max:100|unique:categories,categories_name',
            'photo'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'cat_name.required' => 'Categories Name Required',
            'cat_name.unique' =>'Name Categories Is Exists ',
            'photo.required' => 'Please Choose A Photo',

        ];

    }
}
