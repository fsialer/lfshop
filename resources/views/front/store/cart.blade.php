@extends('front.template.main') @section('content')
<div class="container text-center">
    <div class="page-header">
        <h1><i class="fa fa-opencart fa-3x" aria-hidden="true"></i>Carrito de Compras</h1>
    </div>

    @if(count($cart))
    <a href="{{route('cart.trash')}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar Carrito</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr>
                    <td><img src="{{asset('images/products/'.$item->image)}}" alt="" width="50"></td>                
                    <td>{{$item->name}}</td>
                    <td>$ {{number_format($item->price,2)}}</td>
                    <td>
                        <input type="number" value="{{$item->quantity}}" min="1" max="100" id="input_quantity_{{$item->id}}"
                        onchange="change_input('{{$item->slug}}',{{$item->id}})">
                    </td>
                    <td>$ {{number_format($item->price*$item->quantity,2)}}</td>
                    <td><a href="{{route('cart.delete',$item->slug)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>
            <span class="label label-success">Total: ${{number_format($total,2)}}</span>
        </h3>
        <hr>
        <p>
            <a href="{{route('store.index')}}" class="btn btn-primary">Seguir Comprando</a>
            <a href="{{route('order-detail')}}" class="btn btn-warning">Continuar</a>
        </p>
    </div>
    @else
    <h3>No hay Productos en el carrito</h3>
    <hr>
    <p>
        <a href="{{route('store.index')}}" class="btn btn-primary">Regresar</a>
        
    </p>
    @endif


</div>

@endsection