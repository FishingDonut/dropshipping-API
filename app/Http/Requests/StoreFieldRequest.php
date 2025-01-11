<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreFieldRequest extends FormRequest
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
            'category_id' => 'required|numeric',
            'name' => 'required|min:4',
            'type' => 'required',
            'options' => 'nullAble',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'The category ID is required.',
            'category_id.numeric' => 'The category ID must be a number.',
            'name.required' => 'The name is required.',
            'name.min' => 'The name must be at least 4 characters.',
            'type.required' => 'The type is required.',
            'options.nullable' => 'The options field is optional.',
        ];
    }
}
