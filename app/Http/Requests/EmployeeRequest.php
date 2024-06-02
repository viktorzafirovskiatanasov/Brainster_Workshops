<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        // ame (required),
        // email (required, valid email address format) and
        // phone (optional),
        // company_id (required, foreign key to the companies table, value must exist in the companies table
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The :attribute is required',
            'surname.required' => 'The :attribute is required',
            'email.required' => 'The :attribute is required',
            'email.email' => 'The :attribute has to be in the right format',
            'phone.required' => 'The :attribute is required'
        ];
    }
}
