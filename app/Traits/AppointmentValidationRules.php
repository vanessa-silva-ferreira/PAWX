<?php

namespace App\Traits;

trait AppointmentValidationRules
{
    /**
     * Regras de validação para a criação ou atualização de uma marcação.
     *
     * @param bool $isUpdate Indica se é uma atualização.
     * @return array
     */
    public function appointmentRules(bool $isUpdate = false)
    {
        $rules = [
            'pet_id' => 'required|exists:pets,id',
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ];

        if ($isUpdate) {
            $rules['pet_id'] = 'nullable|exists:pets,id';
            $rules['employee_id'] = 'nullable|exists:employees,id';
            $rules['service_id'] = 'nullable|exists:services,id';
        }

        return $rules;
    }

    /**
     * Extrai os dados relevantes para uma marcação de um array de dados.
     *
     * @param array $requestData
     * @return array
     */
    public function extractAppointmentData(array $requestData): array
    {
        return array_intersect_key($requestData, array_flip([
            'pet_id', 'employee_id', 'service_id', 'appointment_date', 'status', 'total_price'
        ]));
    }
}
