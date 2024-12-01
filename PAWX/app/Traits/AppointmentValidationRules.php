<?php

namespace App\Traits;

trait AppointmentValidationRules
{
    public function appointmentRules()
    {
        return[
            'pet_id' => 'required|exists:pets,id',
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
            'status' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0',
        ];
    }

    public function extractAppointmentData(array $requestData): array
    {
        return array_intersect_key($requestData, array_flip([
            'pet_id', 'employee_id', 'appointment_date', 'status', 'total_price'
        ]));
    }
}
