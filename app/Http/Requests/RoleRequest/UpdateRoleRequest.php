<?php

namespace App\Http\Requests\RoleRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
        $id = $this->route('role');
        return [
            'name' => 'nullable|string|max:255',
            'slug' => 'required|string|unique:roles,slug,' . $id,
            'description' => 'nullable|string'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name cannot be longer than 255 characters.',
            'slug.string' => 'The slug must be a valid string.',
            'slug.unique' => 'This slug already exists. Please choose a different one.',
            'description.string' => 'The description must be a valid string.',
        ];
    }

}
