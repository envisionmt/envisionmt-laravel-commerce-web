<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
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
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|min:6|max:50|confirmed',
        ];
    }
}
