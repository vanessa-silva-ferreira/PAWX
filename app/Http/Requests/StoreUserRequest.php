<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\UserValidationRules;


class StoreUserRequest extends FormRequest
{
    use UserValidationRules;
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {
//        return [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:8',
//            'type' => 'sometimes|string|in:admin,employee,client',
//        ];
        return array_merge($this->userRules(), [
            'password' => 'required|string|min:8|confirmed', // Ensure password is required
            'email' => 'required|email|unique:users,email', // Ensure email is unique
            'username' => 'nullable|string|max:50|unique:users,username', // Ensure username is unique
        ]);
    }

    public function validated($key = null, $default = null): array
    {
        $validatedData = parent::validated();
        return $this->extractUserData($validatedData);
    }
}
