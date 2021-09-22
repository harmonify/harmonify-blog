<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'title' => 'required|string|min:3|max:255',
            'slug' => ['required', 'string', 'min:3', 'max:255', Rule::unique('posts')->ignore($this->post->id, 'id')],
            'thumbnail' => 'required|string|max:1000',
            'body' => 'required|string|min:20|max:10000',
            'category_id' => 'required|numeric',
        ];
    }
}
