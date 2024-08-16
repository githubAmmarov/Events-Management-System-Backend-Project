<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotographyTeamRequest extends FormRequest
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
        'name' => 'required|string',
        'address' => 'required|string',
        'cost' => 'required|integer|min:1',
        'phone_number' => ['required','regex:/^(\+?963|0)?9[0-9]{8}$/'],
        'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    ];
    }
}
