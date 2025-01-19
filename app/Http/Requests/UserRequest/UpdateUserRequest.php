<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'name' => ['nullable', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'password' => ['nullable', 'string', 'min:8'],
            'gender' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'unique:users,phone,' . $id],
            'system' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'The name must be a valid string.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already taken. Please choose another one.',
            'password.min' => 'Password must be at least 8 characters long.',
            'phone.string' => 'The phone must be a valid string.',
            'phone.unique' => 'This phone is already registered. Please choose another one.',
            'system.string' => 'System must be a valid string.',
        ];
    }
}
