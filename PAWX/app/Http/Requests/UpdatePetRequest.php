<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\PetValidationRules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UpdatePetRequest extends FormRequest
{
    use PetValidationRules;


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge($this->petRules(), [
            'client_id' => 'nullable|exists:clients,id'
        ]);
    }

    public function validated($key = null, $default = null): array
    {
        $validatedData = parent::validated();
        return $this->extractPetData($validatedData);
    }
}
