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
            'food_category' => 'required|string|exists:food_categories,category',
            'name' => 'required|string',
            'price' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
