@extends('front.template.main') @section('content')
<div class="container-fluid">
    <div class="col-md-4">
        @include('front.template.partials.filter')
    </div>
    <div class="col-md-8">
        <div class="row">
            @if($products->total()>0) 
            @foreach($products as $product)
            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <div class="img-container">
                        <img class="img-responsive img-thumbnail" alt="Responsive image" src="{{asset('images/products/'.$product->images->first()->name)}}" height="500" width="800">
                    </div>
                    <div class="caption">
                        <p>
                            <a class="link" href="{{route('store.show',$product->slug)}}">
                                <h3 class="title-product">{{$product->name}}</h3>
                            </a>
                        </p>

                        <p><span class="label label-success">$ {{number_format($product->price,2)}}</span></p>
                        <p>
                            <a href="{{route('cart.add',$product->slug)}}" class="btn btn-primary">
                                <i class="fa fa-cart-plus fa-1x" aria-hidden="true"></i> Carrito
                            </a>
                            <a href="{{route('store.show',$product->slug)}}" class="btn btn-default">Leer más</a>
                        </p>

                    </div>
                </div>
            </div>
            @endforeach @else
            <div class="text-center">
                <span class="label label-default">No hay productos</span>
            </div>

            @endif

        </div>
        <div class="row text-center">
            {!! $products->render() !!}
        </div>
    </div>

</div>


@endsection