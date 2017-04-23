<?php

namespace App\Http\ViewComposers;
use Illuminate\Contracts\View\View;
use App\Category;
use App\Product;
use App\SubCategory;
use App\TypeProduct;
use Illuminate\Routing\Route;
class FilterComposer{
    
    public function compose(View $view){
        
      $route=\Route::current()->parameters();  
      $category=Category::with(['subcategories.products'=>function($query){
        $query->with('typeproduct')->groupBy('typeproduct_id')->get();
      }])->where('slug',$route['slug'])->first();
     
      $subcategoryd=Subcategory::with(['products'=>function($query){
         $query->with('mark')->groupBy('mark_id')->get();
      }])->where('slug',$route['slug2'])->first();
      

      
      //dd($subcategory);
     /* $category2=Category::with(['subcategories.products'=>function($query){
        $query->with('mark')->groupBy('mark_id')->get();
      }])->where('slug',$route['slug'])->first();*/
     /* $typeprod=TypeProduct::with('products')->get();*/
      //dd($category);
     
      
     
      $view->with('category',$category)->with('subcategoryd',$subcategoryd);
    }
}