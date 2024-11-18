<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\PetValidationRules;


class UpdatePetRequest extends FormRequest
{
    use PetValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $pet = $this->route('pet');
        return auth()->user()->can('update', $pet);
    }

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
