<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
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

        if ($this->hasFile('photos')) {
            $validatedData['photos'] = $this->handlePhotos($this->file('photos'));
        }

        return $this->extractPetData($validatedData);
    }
}
