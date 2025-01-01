<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'mobile_number' => 'required|string|unique:users,mobile_number',
            'role_id' => 'required|integer'
        ];
    }

    public function messages()
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
        'mobile_number.required' => 'The mobile number field is required.',
        'mobile_number.string' => 'The mobile number must be a valid string.',
        'mobile_number.unique' => 'This mobile number is already in use.',
        'role_id.required' => 'The role ID field is required.',
        'role_id.integer' => 'The role ID must be an integer.',
        ];
    }
}
