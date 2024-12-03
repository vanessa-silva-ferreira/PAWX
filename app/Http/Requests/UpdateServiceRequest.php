<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ServiceValidationRules;

class UpdateServiceRequest extends FormRequest
{
    use ServiceValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->serviceRules();
    }

    public function validated($key = null, $default = null)
    {
        return $this->extractServiceData(parent::validated());
    }
}
