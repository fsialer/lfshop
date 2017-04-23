<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Mark;
use App\TypeProduct;
use App\Image;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=Product::filterAndPaginate($request);   
        return view('admin.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
         $marks=Mark::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
        $typeproducts=TypeProduct::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
         return view('admin.product.create')->with('categories',$categories)->with('marks',$marks)->with('typeproducts',$typeproducts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=new Product($request->all());
        $product->visible=1;
        $product->save();  
        $file=$request->file('image');
        foreach($file as $image){
            $name='p_'.time().rand().'.'.$image->getClientOriginalExtension();
            $image->storeAs('products',$name,'asset');       
            $image=new Image();
            $image->name=$name;
            $image->product()->associate($product);
            $image->save();
        }        
        Flash::success("Se ha creado el producto ".$product->name.' de forma satisfactoria.')->important();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('slug',$id->slug)->firstOrFail();
        $categories=Category::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');
        $subcategories=SubCategory::where('category_id',$product->subcategory->category_id)->pluck('name', 'id')->prepend('','');
        $marks=Mark::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');
        $typeproducts=TypeProduct::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');

       
        return view('admin.product.edit')->with('product',$product)->with('categories',$categories)->with('subcategories',$subcategories)->with('marks',$marks)->with('typeproducts',$typeproducts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product=Product::where('slug',$id->slug)->firstOrFail();
        $product->fill($request->all());     
        $product->visible=$request->has('visible') ? 1 : 0;
        $product->save();   
        Flash::warning("Se ha editado el producto ".$product->name.' de forma satisfactoria.')->important();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::with('images')->find($id);
        $product->images->each(function($image){
            \File::delete(public_path().'/images/products/'.$image->name);            
        });
        $product->delete();
       Flash::error("Se ha elimnado el producto ".$product->name.' de forma satisfactoria.')->important();
        return redirect()->route("product.index");
    }
}