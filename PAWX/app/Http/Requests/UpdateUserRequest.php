<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
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
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                //Rule::unique('users')->ignore($this->route('id'))
            ],
            'password' => 'sometimes|string|min:8',
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
}
