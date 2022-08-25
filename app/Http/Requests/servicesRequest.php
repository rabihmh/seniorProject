<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;

class servicesRequest extends FormRequest
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
            "service_title" => 'required|max:100',
            "service_cat" => 'required',
            "service_subcat" => 'required',
            "service_desc" => 'required|max:4000',
            "service_duration" => 'required',
            "service_price" => 'required',
            "g-recaptcha-response" => function ($attribute, $value, $fail) {
                $secretkey = "6LdZxaghAAAAAARNm4Ipz7737tX6b9j3r0lIaIx3";
                $response = $value;
                $userIp = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$response&remoteip=$userIp";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if (!$response->success) {
                    Session::flash('g-recaptcha-response','please check recaptcha');
                    Session::flash('alert-class','alert-danger');

                    $fail($attribute.'google capatcha failed');
            }
            },
        ];
    }

    public function messages()
    {
        return [
            'service_title.required' => 'Service title required',
            'service_title.max' => 'Service title to long',
            'service_cat.required' => 'Service category required',
            'service_subcat.required' => 'Service Subcategory required',
            'service_desc.required' => 'Service Description required',
            'service_desc.max' => 'Service Description to long',
            'service_duration.required' => 'Service duration required',
            'service_price.required' => 'Service price required',
            'service_price.numeric' => 'The price should be numbers only',
        ];

    }
}
