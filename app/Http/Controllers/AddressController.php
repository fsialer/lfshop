<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\EditAddressRequest;
use Illuminate\Http\Request;
use App\Region;
use App\Address;
use Laracasts\Flash\Flash;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::with('city.municipality.region')->get();
        return view('front.address.index')->with('addresses',$addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $regions=Region::orderBy('name','ASC')->pluck('name', 'id')->prepend('','');
         return view('front.address.create')->with('regions',$regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $address=new Address($request->all());
        $address->save();
        Flash::success("Se ha creado la direccion de forma satisfactoria.")->important();
        return redirect()->route('address.index');
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
       $address=Address::find($id);
        $address->delete();
        Flash::error("Se ha elimino una direccion de forma satisfactoria.")->important();
        return redirect()->route("address.index");
    }
}
