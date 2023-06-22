<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string',
            'email' => 'bail|required|email|unique:users',
            'password' => 'bail|required|string',
            'role_ids' => 'bail|required|array',
            'role_ids.*' => 'bail|required|integer|exists:roles,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required' => 'User name is mandatory',
            'name.string' => 'User name must be a text',
            'email.required' => 'User email is mandatory',
            'email.email' => 'User email must be a valid email address',
            'email.unique' => 'User email must be unique',
            'password.required' => 'User password is mandatory',
            'password.string' => 'User password must be of string type',
            'role_ids.required' => 'Role(s) must be assigned to the user',
            'role_ids.array' => 'User roles collection must be an integer data array',
            'role_ids.*.required' => 'User roles collection must consist of roles',
            'role_ids.*.integer' => 'User role ids in roles collection must be of integer type',
            'role_ids.*.exists' => 'User roles do not exist'
        ];
    }
}
