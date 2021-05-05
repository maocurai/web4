<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required|min:3|max:32',
            'email' => 'required|email',
            'password' => 'required|unique:registrations|min:8',
            'passwordRepeate' => 'required',
            'same' => ':passwordRepeate :password'
        ];
    }
}
