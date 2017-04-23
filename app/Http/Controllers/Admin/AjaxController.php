<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Municipality;
use App\SubCategory;
class AjaxController extends Controller
{
    public function municipality(Request $request){
      
            return Municipality::where('region_id',$request->region_id)->pluck('name', 'id')->prepend('',0);

        
    }
    public function subcategory(Request $request){
      
            return SubCategory::where('category_id',$request->category_id)->pluck('name', 'id')->prepend('',0);

        
    }
}
