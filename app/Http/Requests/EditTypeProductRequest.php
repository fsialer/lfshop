<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
class EditTypeProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
       private $route;
    
    public function __construct(Route $route){
        $this->route=$route;
    }
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
            'name'=>'min:2|max:250|required|unique:type_products,name,'.$this->route->getParameter('typeproduct'),
            'description'=>'required',
        ];
    }
}