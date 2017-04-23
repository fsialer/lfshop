<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EditAccountRequest;
use Passval\Http\Requests\ResetUserRequest;
use App\User;
use App\Order;
use Laracasts\Flash\Flash;
class AccountController extends Controller
{
    public function index(){
         return view('front.account.profile');
    }
    
    public function create(){
        
    }
    
    public function store(Request $request){
        
    }
    
    public function show($id){
        
    }
    
    public function edit($id){
        
    }
    
    public function update(EditAccountRequest $request,$id){
        $user=User::find($id);     
        $user->fill($request->all());
        $user->save();       
        Flash::warning("Se ha editado el usuario ".$user->fullname.'de forma satisfactoria.')->important();
        return redirect()->route('account.index');

    }
    
    public function destroy($id){
        
    }
    
    public function recovery($id){
        return view('front.account.recovery');
    }
    
    public function change(ResetUserRequest $request,$id){
        //dd($request->npassword);
        $user=User::find($id);    
        //dd($user->password);
        $user->fill($request->all());
        $user->save();       
        Flash::warning("El password del usuario ".$user->name.' '.$user->last_name.' se cambio de forma satisfactoria.')->important();
        return redirect()->route('account.profile',$id);
        
    }
    
    public function order(Request $request,$id){
         $orders=Order::where('user_id',$id)->search($request->date_start,$request->date_finish)->orderBy('id','desc')->paginate();;
        return view('front.account.order')->with('orders',$orders);
        
    }
    
    public function detail($id,$user_id){
        $order=Order::where('user_id',$user_id)->with('user','products')->find($id);
        $total=0;
        foreach($order->products as $product){
            $total+=$product->pivot->price*$product->pivot->quantity;
        }
        return view('front.account.detail')->with('order',$order)->with('total',$total);
    }
    
}
