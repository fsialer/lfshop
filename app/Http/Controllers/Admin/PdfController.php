<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
class PdfController extends Controller
{
    
    public function crearPDF($data,$vistaurl){
        $datav=$data;
        $date=date('Y-m-d');
        $view= \View::make($vistaurl,compact('datav','date'))->render();
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte');
        
    }
    
    public function product(){
        $vistaurl="admin.pdf.product.index";
        $products=Product::with('subcategory.category','mark')->orderBy('name','asc')->get();
        return $this->crearPDF($products,$vistaurl);
    }
    
    public function order($id){
        $vistaurl="admin.pdf.order.index";
        $order=Order::with('user','products')->find($id);
        $total=0;
        foreach($order->products as $product){
            $total+=$product->pivot->price*$product->pivot->quantity;
        }
        $order->setTotal($total);
        return $this->crearPDF($order,$vistaurl);
    }
    
 
    
    
} 