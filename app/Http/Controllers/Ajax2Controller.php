<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;
use App\City;
class Ajax2Controller extends Controller
{
      public function municipality(Request $request){
      
            return Municipality::where('region_id',$request->region_id)->pluck('name', 'id')->prepend('',0);

        
    }
     public function city(Request $request){
      
            return City::where('municipality_id',$request->municipality_id)->pluck('name', 'id')->prepend('',0);

        
    }
}