<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Requests\EditSubCategoryRequest;
use App\Http\Controllers\Controller;
use App\SubCategory;
use App\Category;
use Laracasts\Flash\Flash;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $subcategories=SubCategory::filterAndPaginate($request);
         $categories=Category::orderBy('name','ASC')->pluck('name', 'id');
         $categories->prepend('','');  
        return view('admin.subcategory.index')->with('subcategories',$subcategories)->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories=Category::orderBy('name','ASC')->pluck('name', 'id');
         $categories->prepend('','');  
        return view('admin.subcategory.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $subcategory=new SubCategory($request->all());
        if($request->file('image')){
             $file=$request->file('image');  
            foreach($file as $f){
                $name='sc_'.time().'.'.$f->getClientOriginalExtension();
                $f->storeAs('subcategories',$name,'asset');             
            }            
            //$file->storeAs('subcategories',"{$name}",'asset');  
            $subcategory->image=$name;                
            $subcategory->save();
        }      
       
        Flash::success("Se ha creado la categoria ".$subcategory->name.' de forma satisfactoria.')->important();
        return redirect()->route('subcategory.index');
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
         $subcategory=Subcategory::find($id);       
         $categories=Category::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');     
        return view('admin.subcategory.edit')->with('subcategory',$subcategory)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSubCategoryRequest $request, $id)
    {
        $subcategory=SubCategory::find($id);
        $subcategory->fill($request->all());
        $subcategory->save();    
        Flash::warning("Se ha editado la subcategoria ".$subcategory->name.' de forma satisfactoria.')->important();
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=SubCategory::find($id);
        \File::delete(public_path().'/images/subcategories/'.$subcategory->image);
        $subcategory->delete();
        Flash::error("Se ha elimnado la subcategoria ".$subcategory->name.' de forma satisfactoria.')->important();
        return redirect()->route("subcategory.index");
    }
}
