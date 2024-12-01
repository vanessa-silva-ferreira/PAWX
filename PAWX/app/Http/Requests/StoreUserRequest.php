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
        return array_merge($this->userRules(), [
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|email|unique:users,email',
            'username' => 'nullable|string|max:50|unique:users,username',
            // 'type' => 'sometimes|string|in:admin,employee,client',
        ]);
    }

    public function validated($key = null, $default = null): array
    {
        $validatedData = parent::validated();
        return $this->extractUserData($validatedData);
    }
}
