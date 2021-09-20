<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'role_id' => 'required|numeric',
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'email:dns', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable', Password::defaults()],
        ];
    }
}
