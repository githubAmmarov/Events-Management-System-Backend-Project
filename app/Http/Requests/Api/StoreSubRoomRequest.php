<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubRoomRequest extends FormRequest
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
        'place_name' => 'required|string|exists:places,name',
        // 'place_room_type' => 'required|string|exists:place_room_types,name',
        'name' => 'required|string',
        'capacity' => 'required|integer',
        'cost' => 'required|integer',
        'media' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
