<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'description' => 'sometimes|string|nullable',
            'event_time' => 'required|date',
            'num_of_guests' => 'required|integer',
            'is_private' =>'required|boolean',
            'event_type' => 'required|string|exists:event_types,type',
            'sub_room_id' => 'sometimes|integer|exists:sub_rooms,id',
            // 'sub_room_type' => 'required|string|exists:place_room_types,name'
        ];
    }
}
