<?php

namespace App\Http\Requests;

use App\Model\User;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required..! ',
            'email.email' => 'Email invalidate..!',
            'password.required' => 'cannot be empty field',
            'password.min' => 'Passwords must be longer than 6 characters',
            'password.max' => 'Passwords not long too 20 characters',

        ];
    }
}
