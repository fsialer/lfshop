@extends('front.template.main') 
@section('content')
<div class="container text-center">
   <div class="page-header">
       <h1>Detalle del producto</h1>
   </div>
   <div class="col-md-6">
       <div class="img-container">
           @foreach($product->images as $image)
                <img src="{{asset('images/products/'.$image->name)}}" alt="" width=""> 
           @endforeach
       </div>
   </div>
   <div class="col-md-6">
       <div>
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h2>{{$product->name}}</h2>
               </div>
               <div class="panel-body">
                   <div class="">
                    <p>{{$product->description}}</p>
                    <h3><span class="label label-success">$ {{number_format($product->price,2)}}</span></h3>
                </div>
               </div>
               <div class="panel-footer">
                <a href="{{route('cart.add',$product->slug)}}" class="btn btn-warning form-control"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a>
            </div>
           </div>
       </div>
   </div>
   <div class="col-md-12">
       <a href="{{route('store.index')}}" class="btn btn-info">Regresar</a>
   </div>
   
</div>

@endsection