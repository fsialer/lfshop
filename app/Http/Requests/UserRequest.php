<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'min:2|max:250|required',
            'last_name'=>'min:2|max:250|required',
            'email'=>'min:2|max:250|required|email|unique:users',
            'password'=>'min:2|max:250|required',
            'dni'=>'required|numeric',
            'sex'=>'required'
        ];
    }
}
