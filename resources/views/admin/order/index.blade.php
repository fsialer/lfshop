@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>PEDIDOS</h1>
        <a href="{{route('category.create')}}" class="btn btn-primary">Registrar Categoria</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Subtotal</th>
                    <th>Envio</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>${{number_format($order->subtotal,2)}}</td>
                    <td>${{number_format($order->shipping,2)}}</td>
                    <td>${{number_format($order->subtotal*$order->shipping,2)}}</td>
                     <td>
                        <a href="{{route('order.show',$order->id)}}" class="btn btn-info">Ver Detalle</a>
                         <a href="{{route('order.destroy',$order->id)}}" class="btn btn-danger">Eliminar</a>
                     </td>                      
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $orders->render() !!}
    </div>
    
</div>

@endsection