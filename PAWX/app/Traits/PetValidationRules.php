<?php

namespace App\Traits;

trait PetValidationRules
{
    public function petRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'medical_history' => 'nullable|string',
            'spay_neuter_status' => 'required|boolean',
            'status' => 'required|string|max:255',
            'obs' => 'nullable|string|max:1000',
        ];
    }

    public function extractPetData(array $requestData): array
    {
        return array_intersect_key($requestData, array_flip([
            'name', 'birthdate', 'gender', 'medical_history',
            'spay_neuter_status', 'status', 'obs', 'client_id',
        ]));
    }
}
