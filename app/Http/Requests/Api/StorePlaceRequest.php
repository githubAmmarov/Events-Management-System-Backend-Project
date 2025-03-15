<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StorePlaceRequest extends FormRequest
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
        'place_type_id' => 'required|integer|exists:place_types,id',
        'name' => 'required|string',
        // 'phone_number' => ['required','regex:/^(\+?963|0)?9[0-9]{8}$/'],
        'phone_number' => 'required|integer',
        'address' => 'required|string',
        'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
