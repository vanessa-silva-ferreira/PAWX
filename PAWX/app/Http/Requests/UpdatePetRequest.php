<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $pet = $this->route('pet');
        $user = auth()->user();

//
//        $user = User::whereHas('client_id')->whereId($user_id)->first();

        if ($pet->client_id === $user->getClientId()) {
            return true;
        }

        if ($user->hasRole('employee') || $user->hasRole('admin')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female',
            'medical_history' => 'required|string',
            'spay_neuter_status' => 'required|boolean',
            'status' => 'required|string|max:255',
            'obs' => 'required|string|max:1000',
        ];
    }
}
