<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'email' => [
                'bail', 'required', 'email',
                Rule::unique('users')->ignore($this->route('user'))
            ],
            'password' => 'bail|required|string'
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
            'password.string' => 'User password must be of string type'
        ];
    }
}
