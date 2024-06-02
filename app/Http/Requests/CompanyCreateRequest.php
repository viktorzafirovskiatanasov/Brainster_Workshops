<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'url',
            'website' => 'url',
            'country_id' => 'required|exists:countries,id'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The :attribute is required',
            'email.required' => 'The :attribute is required',
            'email.email' => 'The :attribute has to be in the right format',
            'logo.url' => 'The :attribute has to be in the right format',
            'website.url' => 'The :attribute has to be in the right format',
            'country.required' => 'The :attribute is required',
            'country.exists' => 'The :attribute does not exist in our database, please provide a valid country!!!'
        ];
    }
}
