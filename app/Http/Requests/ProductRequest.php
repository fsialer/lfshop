<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'name'=>'min:2|max:250|required|unique:products',
            'mark_id'=>'required',
            'typeproduct_id'=>'required',
            'image'=>'required',
            'extract'=>'min:2|required',
            'description'=>'min:2|required',
            'price'=>'numeric|required',
        ];
    }
}
