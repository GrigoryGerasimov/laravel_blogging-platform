<?php

namespace App\Http\Requests\Profile\Comment;

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
            'content' => 'bail|required|string',
            'post_id' => 'bail|required|integer|exists:posts,id',
            'user_id' => 'bail|required|integer|exists:categories,id'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Content is mandatory',
            'title.string' => 'Content must be a text',
            'post_id.required' => 'Comment must be allocated to a definite post',
            'post_id.integer' => 'Post id must be an integer',
            'post_id.exists' => 'Post id does not exist',
            'user_id.required' => 'Comment must be left by a definite user',
            'user_id.integer' => 'User id must be an integer',
            'user_id.exists' => 'User id does not exist'
        ];
    }
}
