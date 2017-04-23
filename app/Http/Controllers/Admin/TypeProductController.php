<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TypeProductRequest;
use App\Http\Requests\EditTypeProductRequest;
use App\Http\Controllers\Controller;
use App\TypeProduct;
use Laracasts\Flash\Flash;
class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $type_products=TypeProduct::filterAndPaginate($request);
        return view('admin.type_product.index')->with('type_products',$type_products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type_product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeProductRequest $request)
    {
        $type_product=new TypeProduct($request->all());
        $type_product->save();
        Flash::success("Se ha creado el tipo de producto ".$type_product->name.' de forma satisfactoria.')->important();
        return redirect()->route('typeproduct.index');
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
        $typeproduct=TypeProduct::find($id);
        
        return view('admin.type_product.edit')->with('type_product',$typeproduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTypeProductRequest $request, $id)
    {
         $type_product=TypeProduct::find($id);
        $type_product->fill($request->all());
        $type_product->save();   
         Flash::warning("Se ha editado el tipo de producto ".$type_product->name.' de forma satisfactoria.')->important();
        return redirect()->route('typeproduct.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_product=TypeProduct::find($id);
        $type_product->delete();
        Flash::error("Se ha elimino el tipo de producto ".$type_product->name.' de forma satisfactoria.')->important();
        return redirect()->route("typeproduct.index");
    }
}
