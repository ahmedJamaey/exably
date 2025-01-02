<?php

namespace App\Http\Requests\PermissionRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
        $id = $this->route('permission');
        return [
            'name' => 'required|string|max:255',
            'model' => 'required|string|unique:permissions,model,' .$id,
            'can' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'model.string' => 'The model must be a valid string.',
            'model.unique' => 'This model already exists. Please choose a different one.',
            'can.string' => 'The can field must be a valid string.',
            'can.max' => 'The can field cannot be longer than 255 characters.',
        ];
    }
}
