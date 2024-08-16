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
            'event_type_id' => 'required|integer|exists:event_types,id',
            'sub_room_id' => 'required|integer|exists:sub_rooms,id',
            'description' => 'sometimes|string',
            'event_time' => 'required|date_format:H:i',
            'num_of_guests' => 'required|integer',
            'ticket_price' => 'sometimes|integer',
            'contact_information' => 'required|string',
            'is_private' =>'required|boolean',
            'planner_id'=> 'required|integer',
            'total_cost'=> 'required|integer',
            'event_date'=> 'required|date',

            'food_items' => 'sometimes|array',
            'food_items.*.id' => 'required|integer|exists:food,id',
            'food_items.*.quantity' => 'required|integer|min:1',
            
            'accessory_items' => 'sometimes|array',
            'accessory_items.*.id' => 'required|integer|exists:accessories,id',
            
            'photography_team_id' => 'sometimes|integer|exists:photography_teams,id',
            'invitation_card_style_id' => 'required|integer|exists:invitation_card_styles,id',
            'invitation_card_description' => 'required|string'

        ];
    }
}
