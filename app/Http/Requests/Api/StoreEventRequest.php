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
            'description' => 'sometimes|string',
            'event_time' => 'required|date_format:H:i',
            'num_of_guests' => 'required|integer',
            'is_private' =>'required|boolean',
            'event_type' => 'required|string|exists:event_types,type',
            'sub_room_id' => 'required|integer|exists:sub_rooms,id',
            'planner_id'=> 'required|integer|between:3,4',
            'event_date'=> 'required|date',
            'food_items' => 'sometimes|array|exists:food,id',
            'accessory_items' => 'sometimes|array|exists:accessories,id',
            'photography_team_id' => 'sometimes|integer|exists:photography_teams,id',
            'invetation_card_styles_id' => 'sometimes|integer|exists:invetation_card_styles,id',
            'invetation_card_description' => 'sometimes|string'


            // 'sub_room_type' => 'required|string|exists:place_room_types,name'
        ];
    }
}
