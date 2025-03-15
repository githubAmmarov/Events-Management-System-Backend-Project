<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccessoryRequest extends FormRequest
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
            'accessory_type_id' => 'required|integer|exists:accessory_types,id',
            'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string',
            'price' => 'required|integer'
        ];
    }
}
