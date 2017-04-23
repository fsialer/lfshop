<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Laracasts\Flash\Flash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $users=User::filterAndPaginate($request);
        return view('admin.user.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user=new User($request->all());
        
        //$user->password=bcrypt($user->password);
        $user->type='admin';
        $user->fullname=$user->name.' '.$user->last_name;        
        $user->active=1;       
        $user->save();
        Flash::success("Se ha creado el usuario ".$user->fullname.'de forma satisfactoria.')->important();
        return redirect()->route('user.index');
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
        $user=User::find($id);
        return view('admin.user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user=User::find($id);        
        $user->fill($request->all());
        $user->active=$request->has('active') ? 1 : 0;
        $user->save();       
         Flash::warning("Se ha editado el usuario ".$user->name.' '.$user->last_name.'de forma satisfactoria.')->important();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user=User::find($id);
        $user->delete();
       Flash::error("Se ha elimnado el usuario ".$user->name.' '.$user->last_name.'de forma satisfactoria.')->important();
        return redirect()->route("user.index");
    }
}
