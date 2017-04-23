<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CityRequest;
use App\Http\Requests\EditCityRequest;
use App\Http\Controllers\Controller;
use App\City;
use App\Region;
use App\Municipality;
use Laracasts\Flash\Flash;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $cities=City::filterAndPaginate($request);
         $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
        return view('admin.city.index')->with('cities',$cities)->with('regions',$regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('',''); 
        return view('admin.city.create')->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city=new City($request->all());
        
        $city->visible=true;
        $city->save();
        Flash::success("Se ha creado un distrito ".$city->name.' de forma satisfactoria.')->important();
        return redirect()->route('city.index');
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
        $city=City::with('municipality')->find($id);       
        $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');
        $municipalities=Municipality::where('region_id',$city->municipality->region_id)->pluck('name', 'id')->prepend('','');
        return view('admin.city.edit')->with('city',$city)->with('regions',$regions)->with('municipalities',$municipalities);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCityRequest $request, $id)
    {
        $city=City::find($id);
        $city->fill($request->all());
        $city->visible=$request->has('visible') ? 1 : 0;
        $city->save();    
        Flash::warning("Se ha editado el distrito ".$city->name.' de forma satisfactoria.')->important();
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $city=City::find($id);
        $city->delete();
        Flash::error("Se ha elimino el distrito ".$city->name.' de forma satisfactoria.')->important();
        return redirect()->route("city.index");
    }
}
