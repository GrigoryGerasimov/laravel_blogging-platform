<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => [
                'bail', 'required', 'string',
                Rule::unique('posts')->ignore($this->route('post'))
            ],
            'content' => 'bail|required|string',
            'category_id' => 'bail|required|integer|exists:categories,id',
            'preview_img' => 'bail|nullable|file',
            'main_img' => 'bail|nullable|file',
            'tag_ids' => 'bail|required|array',
            'tag_ids.*' => 'bail|required|integer|exists:tags,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Post title is mandatory',
            'title.string' => 'Post title must be a text',
            'title.unique' => 'Post title must be unique',
            'content.required' => 'Post content is mandatory',
            'content.string' => 'Post content must be a text',
            'category_id.required' => 'Post must be allocated to a category',
            'category_id.integer' => 'Post category id must be an integer',
            'category_id.exists' => 'Post category id does not exist',
            'preview_img.required' => 'Preview image is mandatory',
            'preview_img.file' => 'Preview image must be a file',
            'main_img.required' => 'Preview image is mandatory',
            'main_img.file' => 'Preview image must be a file',
            'tag_ids.required' => 'Post must be allocated to tag(s)',
            'tag_ids.array' => 'Post tags collection must be an integer data array',
            'tag_ids.*.required' => 'Post tags collection must consist of tags',
            'tag_ids.*.integer' => 'Post tags in tags collection must be of integer type',
            'tag_ids.*.exists' => 'Post tags do not exist'
        ];
    }
}
