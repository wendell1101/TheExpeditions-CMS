<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'published_at' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
        return [
            'title. required' => 'A post title is required',
            'description.required' => 'A post description is required',
            'content.required' => 'A post content is required',
            'published_at.required' => 'Please specify when to publish the post',
            'image.image' => 'The image must be a type of "jpeg, png, jpg, gif, svg" only'
        ];
    }
}
