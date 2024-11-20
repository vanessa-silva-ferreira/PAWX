<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth()->user();
        if ($user->hasRole('employee') || $user->hasRole('admin') || $user->hasRole('client')) {
            return true;
        }

        return false;    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'employee_id' => 'required|exists:employees,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ];
    }
}
