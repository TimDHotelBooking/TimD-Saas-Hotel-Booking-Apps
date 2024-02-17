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
            'customer_id' => ["required",Rule::exists("customers","customer_id")],
            'room_id' => ["required",Rule::exists("rooms","room_id")],
            'check_in_date' => "required|date",
            'check_out_date' => "required|date|after_or_equal:check_in_date",
            'total_amount' => "required",
            'agent_id' => ["required",Rule::exists("agents","agent_id")],
        ];
    }
}
