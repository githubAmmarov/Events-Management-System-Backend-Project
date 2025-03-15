<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'food_category_id' => 'required|integer|exists:food_categories,id',
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'sometimes|string',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
