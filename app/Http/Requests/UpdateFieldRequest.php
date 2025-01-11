<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class UpdateFieldRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'failedValidation',
            'errors' => $validator->errors(),
        ], 422));
    }

    public function rules()
    {
        return [
            'category_id' => 'exists:categories,id', // Deve existir na tabela categories
            'name' => 'string|min:3|max:255',       // Nome com limites de caracteres
            'type' => 'in:string,integer,select',  // Tipos válidos
            'options' => 'nullable|array',                   // JSON opcional
        ];
    }

    public function messages()
    {
        return [
            'category_id.exists' => 'The selected category ID does not exist.',
            'name.string' => 'The name must be a string.',
            'name.min' => 'The name must have at least 3 characters.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'type.in' => 'The type must be one of the following: string, integer, or select.',
            'options.array' => 'The options field must be a valid JSON string.',
        ];
    }
}
