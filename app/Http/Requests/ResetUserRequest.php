<?php

namespace Passval\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetUserRequest extends FormRequest
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
            'apassword'=>'required|min:6|current_password',
            'password'=>'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [];
    }
 
    /**
     * Get the sanitized input for the request.
     *
     * @return array
     */
    public function sanitize()
    {
        return $this->only('apassword');
    }
}
