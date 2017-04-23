<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MarkRequest;
use App\Http\Requests\EditMarkRequest;
use App\Http\Controllers\Controller;
use App\Mark;
use Laracasts\Flash\Flash;
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marks=Mark::filterAndPaginate($request);
         
        return view('admin.mark.index')->with('marks',$marks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         return view('admin.mark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
         $mark=new Mark($request->all());
        $mark->save();
        Flash::success("Se ha creado la marca ".$mark->name.' de forma satisfactoria.')->important();
        return redirect()->route('mark.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark=Mark::find($id);
        
        return view('admin.mark.edit')->with('mark',$mark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMarkRequest $request, $id)
    {
         $mark=Mark::find($id);
        $mark->fill($request->all());
        $mark->save();   
         Flash::warning("Se ha editado la marca ".$mark->name.' de forma satisfactoria.')->important();
        return redirect()->route('mark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $mark=Mark::find($id);
        $mark->delete();
        Flash::error("Se ha elimino la marca ".$mark->name.' de forma satisfactoria.')->important();
        return redirect()->route("mark.index");
    }
}
