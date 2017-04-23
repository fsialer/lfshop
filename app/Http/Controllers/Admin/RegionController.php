<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegionRequest;
use App\Http\Requests\EditRegionRequest;

use App\Http\Controllers\Controller;
use App\Region;
use Laracasts\Flash\Flash;
class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regions=Region::filterAndPaginate($request);
        return view('admin.region.index')->with('regions',$regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
         $region=new Region($request->all());
        $region->visible=true;
        $region->save();
        Flash::success("Se ha creado la region ".$region->name.' de forma satisfactoria.')->important();
        return redirect()->route('region.index');
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
        $region=Region::find($id);
        return view('admin.region.edit')->with('region',$region);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRegionRequest $request, $id)
    {
        $region=Region::find($id);
        $region->fill($request->all());
        $region->visible=$request->has('visible') ? 1 : 0;
        $region->save();    
        Flash::warning("Se ha editado la region ".$region->name.' de forma satisfactoria.')->important();
        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $region=Region::find($id);
        $region->delete();
        Flash::error("Se ha elimino la marca ".$region->name.' de forma satisfactoria.')->important();
        return redirect()->route("region.index");
    }
}
