<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
        'event_id'=>'required|integer|exists:events,id',
        'user_id'=>'required|integer|exists:users,id',
        'sub_room_id'=>'required|integer|exists:sub_rooms,id',
        'photography_team_id'=>'sometimes|integer|exists:photography_teams,id',
        'invitation_card_id'=>'required|integer|exists:invitation_cards,id',
        'is_paid'=>'required|boolean',
        'total_cost'=>'required|integer',
        ];
    }
}
