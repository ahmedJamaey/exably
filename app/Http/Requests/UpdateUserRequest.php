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
        $id = $this->route('user');
        return [
                'name' => 'nullable|string',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'gender' => 'nullable|string',
                'mobile_number' => 'required|string|unique:users,mobile_number,' . $id,
                'role_id' => 'nullable|integer'
            ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name must be a valid string.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken. Please choose another one.',
            'password.min' => 'Password must be at least 8 characters long.',
            'mobile_number.string' => 'The mobile number must be a valid string.',
            'mobile_number.unique' => 'This mobile number is already registered. Please choose another one.',
            'role_id.integer' => 'Role ID must be a valid integer.',
        ];
    }
}
