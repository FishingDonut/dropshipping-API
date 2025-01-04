<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'failedValidation',
            'errors' => $validator->errors(),
        ], 422));
    }

    public function rules(): array
    {
        return [
            'fullName' => 'nullable|min:4',
            'email' => 'nullable|unique:users',
            'password' => 'nullable|min:8',
            'phone' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'The full name field is required.',
            'fullName.min' => 'The full name must be at least 4 characters.',

            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',

            'password.required' => 'The password field is required.',
            'password.min' => 'The password must have 8 characters.',

            'phone.required' => 'The phone number field is required.',
        ];
    }
}
