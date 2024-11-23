<?php

namespace App\Traits;

trait UserValidationRules
{
    public function userRules(): array
    {
        return [
//            'name' => 'nullable|string|max:255',
//            'email' => 'required|email|unique:users,email,' . ($this->user->id ?? 'NULL') . ',id',
//            'phone_number' => 'nullable|string|max:15',
//            'nif' => 'nullable|string|max:20',
//            'username' => 'nullable|string|max:255|unique:users,username,' . ($this->user->id ?? 'NULL') . ',id',
//            'address' => 'nullable|string|max:500',
//            'password' => 'nullable|string|min:8|confirmed',
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                //Rule::unique('users')->ignore($this->route('id'))
            ],
            'password' => 'nullable|string|min:8',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|size:9',
            'nif' => 'nullable|string|size:9',
            'username' => [
                'nullable',
                'string',
                'max:50',
                //Rule::unique('users')->ignore($this->route('id'))
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
