<?php

namespace App\Traits;

trait UserValidationRules
{
    public function userRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => 'nullable|string|min:8',
            'password_confirmation' => [
                'required_with:password',
            ],
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|size:9',
            'nif' => 'nullable|string|size:9',
            'username' => [
                'nullable',
                'string',
                'max:50',
            ],
        ];
    }

    public function extractUserData(array $requestData): array
    {
        return array_intersect_key($requestData, array_flip([
            'name', 'email', 'phone_number', 'nif', 'username', 'address', 'password',
        ]));
    }
}
