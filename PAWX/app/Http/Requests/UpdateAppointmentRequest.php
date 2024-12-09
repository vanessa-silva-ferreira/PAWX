<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\AppointmentValidationRules;

class UpdateAppointmentRequest extends FormRequest
{
    use AppointmentValidationRules;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'service_id' => 'required|exists:services,id',
            'employee_id' => 'nullable|exists:employees,id',
            'appointment_date' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'nullable|numeric',
        ];
    }


    public function validated($key = null, $default = null)
    {
        return $this->extractAppointmentData(parent::validated());
    }
}
