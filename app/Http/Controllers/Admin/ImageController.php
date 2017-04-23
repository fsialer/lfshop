<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Image;
use Laracasts\Flash\Flash;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ImageRequest $request)
    {
       $file=$request->file('image');
        foreach($file as $image){
            $name='p_'.time().rand().'.'.$image->getClientOriginalExtension();
            $image->storeAs('products',"{$name}",'asset');       
            $image=new Image();
            $image->name=$name;
            $image->product_id=$request->product_id;
            $image->save();
        }
        return redirect()->route('image.show',$request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images=Image::with('product')->orderBy('id','asc')->where('product_id',$id)->paginate(3);
        return view('admin.image.show')->with('images',$images);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.image.create')->with('id',$id);
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
         $image=Image::find($id);
        $p=$image->product_id;
        \File::delete(public_path().'/images/products/'.$image->name);            
        $image->delete();
       
        return redirect()->route("image.show",$p);
    }
}