<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true because the authorization logic is handled in another part of the application
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
            'slug' => 'required|string|min:3|max:255|unique:posts',
            'thumbnail' => 'required|string|max:1000',
            'body' => 'required|string|min:20|max:10000',
            'category_id' => 'required|numeric',
        ];
    }
}
