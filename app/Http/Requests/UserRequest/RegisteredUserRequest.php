<?php

namespace App\Http\Requests\UserRequest;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisteredUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'gender' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:users,phone'],
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already taken.',
            'password.required' => 'The password field is required.',
            'password.string' => 'The password must be a valid string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'gender.required' => 'The gender field is required.',
            'gender.string' => 'The gender must be a valid string.',
            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a valid string.',
            'phone.unique' => 'This phone is already in use.',
        ];
    }
}
