<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Mark;
use App\Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=Product::search($request->name)->orderBy('id','desc')->paginate(6);
        $products->each(function($products){
            $products->category;
            $products->mark;
            $products->images;
        });
        return view('admin.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories=Category::orderBy('name','ASC')->pluck('name', 'id');
        
        $marks=Mark::orderBy('name','ASC')->pluck('name', 'id');
        
         return view('admin.product.create')->with('categories',$categories)->with('marks',$marks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$name="";
        /*if ($request->file('image')) {
            $file=$request->file('image');
            $name='product_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/images/products/';
            $file->move($path,$name);
        }*/
        /*$name_c=$name;
        dd($name_c);*/
        $file=$request->file('image');
        $name='product_'.time().'.'.$file->getClientOriginalExtension();
        $file->storeAs('products',"{$name}",'asset');
       $product=new Product($request->all());
        $product->visible=1;
        $product->save();  
        $image=new Image();
        $image->name=$name;
        $image->product()->associate($product);
        $image->save();
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
        $categories=Category::orderBy('name','ASC')->pluck('name', 'id');        
        $marks=Mark::orderBy('name','ASC')->pluck('name', 'id');
        //dd($product);
        return view('admin.product.edit')->with('product',$product)->with('categories',$categories)->with('marks',$marks);
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
        //dd($id);
        $product=Product::where('slug',$id->slug)->firstOrFail();
        $product->fill($request->all());
        $product->save();       
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
        $product=Product::find($id);
        $product->delete();
       
        return redirect()->route("product.index");
    }
}
