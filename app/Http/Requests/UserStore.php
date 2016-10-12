<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'roles'     => 'required',
            'password'  => 'required',
            'password2' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password2.required'    => 'Please re-enter your password',
            'password2.same'        => 'Please re-enter the correct password'
        ];
    }
}
