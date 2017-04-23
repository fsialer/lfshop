<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Image;
use App\TypeProduct;
use App\Mark;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products= Product::with('subcategory.category','images')->orderBy('id','desc')->paginate();
        /*$products->each(function($products){
            $products->category;
            $products->mark;
            $products->images;
            ///dd($products->images->first());
        });*/
        
        return view('front.store.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product= Product::where('slug', $slug)->firstOrFail();
        $product->category;
        $product->mark;
        $product->images;
        return view('front.store.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function SearchCategory($slug){
        $category=Category::with('subcategories')->searchCategory($slug)->first(); 
        //dd($category);
        $subcategories=$category->subcategories()->paginate();
        return view('front.store.category')->with('subcategories',$subcategories);
    }
    
    public function SearchSubCategory(Request $request,$slug,$slug2){
        $count=SubCategory::searchSubCategory($slug2)->count();
        if($count>0){
            $subcategory=SubCategory::with('products')->searchSubCategory($slug2)->firstOrFail();  
            $products=$subcategory->products()->orderBy('id','desc')->paginate(); 
        }else{
            $typeproduct=TypeProduct::with('products')->searchTypeProduct($slug2)->firstOrFail();  
            $products=$typeproduct->products()->orderBy('id','desc')->paginate(); 
        }       
        return view('front.store.product')->with('products',$products);
    }
   /* public function SearchTypeProduct(Request $request,$slug,$slug2,$slug3){
        $typeproduct=TypeProduct::with('products')->searchTypeProduct($slug3)->firstOrFail();  
        $products=$typeproduct->products()->orderBy('id','desc')->paginate();    
            
        return view('front.store.product')->with('products',$products);
    }*/
}
