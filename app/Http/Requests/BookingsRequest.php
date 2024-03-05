<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingsRequest extends FormRequest
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
            'room_id' => ["required",Rule::exists("rooms","room_id")],
            'no_of_guests' => "required",
            'no_of_rooms' => "required",
            'check_in_date' => "required|date",
            'check_out_date' => "required|date|after_or_equal:check_in_date",
            'first_name' => "required|string",
            'last_name' => "required|string",
            'email' => "required|email",
            'phone_number' => "required",
        ];
    }
}
