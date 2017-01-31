@extends('front.template.main') 
@section('content')
<div class="container text-center">
    @foreach($products as $product)
    <div class="col-md-3">
        <div class="panel panel-default box-product">
            <div class="panel-heading text-center">
                <h1>{{$product->name}}</h1>
            </div>
            <div class="panel-body">
                <div class="img-container">
                    @foreach($product->images as $image)
                    <img src="{{asset('images/products/'.$image->name)}}" alt="" width="200"> 
                    @endforeach
                </div>
                <div class="">
                    <p>{{$product->description}}</p>
                    <h3><span class="label label-success">$ {{number_format($product->price,2)}}</span></h3>
                </div>

            </div>
            <div class="panel-footer">
                <a href="{{route('cart.add',$product->slug)}}" class="btn btn-warning"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a>
                <a href="{{route('store.show',$product->slug)}}" class="btn btn-info">Leer más</a>
            </div>
        </div>
    </div>
    @endforeach  
     
</div>
 <div class="row text-center">
        {!! $products->render() !!}
    </div>
@endsection