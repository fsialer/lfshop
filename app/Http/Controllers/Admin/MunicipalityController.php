<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MunicipalityRequest;
use App\Http\Requests\EditMunicipalityRequest;
use App\Http\Controllers\Controller;
use App\Municipality;
use App\Region;
use Laracasts\Flash\Flash;
class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $municipalities=Municipality::filterAndPaginate($request);
        $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
        return view('admin.municipality.index')->with('municipalities',$municipalities)->with('regions',$regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
        return view('admin.municipality.create')->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipalityRequest $request)
    {
         $municipality=new Municipality($request->all());
        $municipality->visible=true;
        $municipality->save();
        Flash::success("Se ha creado una provincia ".$municipality->name.' de forma satisfactoria.')->important();
        return redirect()->route('municipality.index');
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
        $municipality=Municipality::find($id);       
        $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');       
        return view('admin.municipality.edit')->with('municipality',$municipality)->with('regions',$regions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMunicipalityRequest $request, $id)
    {
         $municipality=Municipality::find($id);
        $municipality->fill($request->all());
        $municipality->visible=$request->has('visible') ? 1 : 0;
        $municipality->save();    
        Flash::warning("Se ha editado la provincia ".$municipality->name.' de forma satisfactoria.')->important();
        return redirect()->route('municipality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality=Municipality::find($id);
        $municipality->delete();
        Flash::error("Se ha elimino la provincia ".$municipality->name.' de forma satisfactoria.')->important();
        return redirect()->route("municipality.index");
    }
}
