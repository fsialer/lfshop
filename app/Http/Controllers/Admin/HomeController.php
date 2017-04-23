<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Order;
use App\User;
class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $products=Product::all();
        $orders=Order::all();
        $users=User::all();
        return view('admin.home')->with('categories',$categories)->with('products',$products)->with('orders',$orders)->with('users',$users);
    }
}
