<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccessoryRequest extends FormRequest
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
            'accessory_type' => 'nullable|string|exists:accessory_types,type',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'nullable|string',
            'price' => 'nullable|integer|min:1'
        ];
    }
}
