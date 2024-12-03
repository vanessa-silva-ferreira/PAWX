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
    public function rules(): array
    {
        return $this->appointmentRules();
    }

    public function validated($key = null, $default = null)
    {
        return $this->extractAppointmentData(parent::validated());
    }
}
