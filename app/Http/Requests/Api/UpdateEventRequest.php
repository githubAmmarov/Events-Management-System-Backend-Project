<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'event_type_id' => 'sometimes|required|integer|exists:event_types,id',
            'sub_room_id' => 'sometimes|required|integer|exists:sub_rooms,id',
            'description' => 'sometimes|string',
            'event_time' => 'sometimes|required|date_format:H:i',
            'num_of_guests' => 'sometimes|required|integer',
            'ticket_price' => 'sometimes|integer',
            'contact_information' => 'sometimes|required|string',
            'is_private' =>'sometimes|required|boolean',
            'planner_id'=> 'sometimes|required|integer',
            'total_cost'=> 'sometimes|required|integer',
            'event_date'=> 'sometimes|required|date',

            'food_items' => 'sometimes|array',
            'food_items.*.id' => 'sometimes|required|integer|exists:food,id',
            'food_items.*.quantity' => 'sometimes|required|integer|min:1',
            
            'accessory_items' => 'sometimes|array',
            'accessory_items.*.id' => 'sometimes|required|integer|exists:accessories,id',
            
            'photography_team_id' => 'sometimes|integer|exists:photography_teams,id',
            'invitation_card_style_id' => 'sometimes|required|integer|exists:invitation_card_styles,id',
            'invitation_card_description' => 'sometimes|required|string'
        ];
    }
}
