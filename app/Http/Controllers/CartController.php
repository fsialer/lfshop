<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image;
class CartController extends Controller
{
    public function __construct(){
        if(!\Session::has('cart')) \Session::put('cart',array());
    }
    //show cart
    
    public function show(){
        $cart=\Session::get('cart');
        $total=$this->total();
        return view('front.store.cart')->with('cart',$cart)->with('total',$total);
    }
    //Add item
    public function add(Product $product){
        $cart=\Session::get('cart');
        $product->quantity=1;
        $imagen=Image::all()->where('product_id',$product->id);
        foreach($imagen as $img){
            $product->image=$img->name; 
        }     
        $cart[$product->slug]=$product;
        \Session::put('cart',$cart);
        return redirect()->route('cart.show');
    }
   public function update(Product $product,$quantity){
        $cart=\Session::get('cart');
        $cart[$product->slug]->quantity=$quantity;
        \Session::put('cart',$cart);
        return redirect()->route('cart.show');
    }
    public function delete(Product $product){
        $cart=\Session::get('cart');
        unset($cart[$product->slug]);
         \Session::put('cart',$cart);
         return redirect()->route('cart.show');
    }
    public function trash(){
        \Session::forget('cart');
        return redirect()->route('cart.show');
    }
    
    
    private function total(){
        $cart=\Session::get('cart');
        $total=0;
        foreach($cart as $item){
            $total+=$item->price*$item->quantity;
        }
        return $total;
    }
    
    public function orderDetail(){
        if(count(\Session::get('cart'))<=0){
            return redirect()->route('store.index');
        }
        $cart=\Session::get('cart');
        $total=$this->total();
        return view('front.store.order-detail')->with('cart',$cart)->with('total',$total);
    }
}