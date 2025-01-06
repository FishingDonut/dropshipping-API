<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateProductRequest extends FormRequest
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
            'name' => 'nullable|string|unique:products',
            'price' => 'nullable|numeric',
            'price_multiplier' => 'nullable|numeric',
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name must be a valid string.',
            'name.unique' => 'A product with this name already exists.',

            'price.numeric' => 'The price must be a numeric value.',

            'price_multiplier.numeric' => 'The price multiplier must be a numeric value.',

            'description.string' => 'The description must be a valid string.',
        ];
    }
}
