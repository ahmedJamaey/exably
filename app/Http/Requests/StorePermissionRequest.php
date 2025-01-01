<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'model' => 'required|string|unique:permissions,model',
            'can' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'model.required' => 'The model field is required.',
            'model.string' => 'The model must be a valid string.',
            'model.unique' => 'This model already exists. Please choose a different one.',
            'can.required' => 'The can field is required.',
            'can.string' => 'The can field must be a valid string.',
            'can.max' => 'The can field cannot be longer than 255 characters.',
        ];
    }

}
