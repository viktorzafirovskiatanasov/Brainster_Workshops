<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //read from db/authenticate admin role
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
            'username' => 'required|min:4|regex:/[0-9]+/',
            'password' => 'required|min:4|regex:/[A-Z]+/'
        ];
    }

    public function messages(){
        return [
            'username.required' => ':attribute e zadolzitelno',
            'username.min' => ':attribute mora da ima barem :min bukvi',
            'username.regex' => ':attribute mora da ima barem eden broj',
            'password.required' => 'lozinkata e zadolzitelna',
            'password.min' => 'lozinkata mora da ima barem :min bukvi',
            'password.regex' => ':attribute mora da ima barem edna golema bukva',
        ];
    }
}
