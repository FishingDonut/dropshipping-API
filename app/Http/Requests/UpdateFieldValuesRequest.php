<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class UpdateFieldValuesRequest extends FormRequest
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
            'field_id' => ['required_without_all:product_id,value', 'exists:fields,id'],
            'product_id' => ['required_without_all:field_id,value', 'exists:products,id'],
            'value' => ['required_without_all:field_id,product_id', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'field_id.required_without_all' => 'The field ID is required when product ID and value are not provided.',
            'product_id.required_without_all' => 'The product ID is required when field ID and value are not provided.',
            'value.required_without_all' => 'The value is required when field ID and product ID are not provided.',
        ];
    }
}
