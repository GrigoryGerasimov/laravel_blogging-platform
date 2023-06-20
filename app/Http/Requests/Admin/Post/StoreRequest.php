<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'bail|required|string|unique:posts',
            'content' => 'bail|required|string',
            'category_id' => 'bail|required|integer|exists:categories,id',
            'preview_img' => 'bail|required|file',
            'main_img' => 'bail|required|file',
            'tag_ids' => 'bail|required|array',
            'tag_ids.*' => 'bail|required|integer|exists:tags,id'
        ];
    }
}
