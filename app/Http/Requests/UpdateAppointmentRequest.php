<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\AppointmentValidationRules;

class UpdateAppointmentRequest extends FormRequest
{
    use AppointmentValidationRules;

    /**
     * Obtém as regras de validação para a atualização da marcação.
     *
     * @return array
     */
    public function rules()
    {
        return $this->appointmentRules(true);
    }

    /**
     * Valida e extrai os dados relevantes.
     */
    public function validated($key = null, $default = null)
    {
        return $this->extractAppointmentData(parent::validated());
    }
}
