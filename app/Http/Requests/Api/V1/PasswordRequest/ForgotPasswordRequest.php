<?php

namespace App\Http\Requests\Api\V1\PasswordRequest;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => '  Email is not valid.',
            'email.exists' => 'Email is already exists.',
        ];
    }
}
