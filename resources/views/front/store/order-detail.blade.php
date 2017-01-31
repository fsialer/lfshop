@extends('front.template.main') 
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>Detalle del pedido</h1>
    </div>
    <div>
        <div class="table-responsive">
            <h3>Datos del Usuario</h3>
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <td>Nombre:</td>
                    <td>{{Auth::user()->name}} {{Auth::user()->last_name}}</td>
                </tr>
                <tr>
                    <td>Correo:</td>
                    <td>{{Auth::user()->email}}</td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>{{Auth::user()->address}}</td>
                </tr>


            </table>
        </div>
        <div class="table-responsive">
            <h3>Datos del pedido</h3>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)

                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{number_format($item->price,2)}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{number_format($item->price*$item->quantity,2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h3>
                Total:${{number_format($total,2)}}
            </h3>
            <p>
                <a class="btn btn-primary" href="{{route('cart.show')}}">Regresar</a>
                <a class="btn btn-success" href="{{route('payment')}}">Pagar con Paypal</a>
            </p>
        </div>
    </div>
</div>
@endsection