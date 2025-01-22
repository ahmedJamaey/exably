<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
{
    public function authorize(): true
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'signature' => 'required|string',
            'expires' => 'required|date_format:U',
            'id' => 'required|integer|exists:users,id',
        ];
    }
    public function messages(): array
    {
        return [
            'signature.required' => 'The verification link is missing a valid signature.',
            'signature.string' => 'The verification signature must be a valid string.',
            'expires.required' => 'The verification link must have an expiration timestamp.',
            'expires.date_format' => 'The expiration timestamp must be a valid Unix timestamp.',
            'id.required' => 'The verification link must contain a valid user ID.',
            'id.integer' => 'The user ID in the verification link must be an integer.',
            'id.exists' => 'The user associated with this verification link does not exist.',
        ];
    }
}
