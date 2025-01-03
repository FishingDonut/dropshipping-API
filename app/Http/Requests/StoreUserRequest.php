<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreUserRequest extends FormRequest
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
            'fullName' => 'required|min:4',
            'email' => 'required|unique:users',
            'password' => 'required',
            'phone' => 'required'
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

            'phone.required' => 'The phone number field is required.',
        ];
    }
}
