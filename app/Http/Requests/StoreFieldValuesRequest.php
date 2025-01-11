<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StoreFieldValuesRequest extends FormRequest
{
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
            'field_id' => ['required', 'exists:fields,id'],
            'product_id' => ['required', 'exists:products,id'],
            'value' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages(): array
    {
        return [
            'field_id.required' => 'The field ID is required.',
            'field_id.exists' => 'The selected field ID does not exist.',
            'product_id.required' => 'The product ID is required.',
            'product_id.exists' => 'The selected product ID does not exist.',
            'value.required' => 'The value field is required.',
            'value.string' => 'The value must be a valid string.',
            'value.max' => 'The value must not exceed 255 characters.',
        ];
    }
}
