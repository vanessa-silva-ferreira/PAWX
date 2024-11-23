<?php

namespace App\Http\Requests;

use App\Traits\UserValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    use UserValidationRules;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->userRules();
    }

    public function validated($key = null, $default = null): array
    {
        $validatedData = parent::validated();
        return $this->extractUserData($validatedData);
    }
}
