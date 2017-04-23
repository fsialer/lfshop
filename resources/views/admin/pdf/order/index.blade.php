@extends('admin.pdf.index')

@section('content')
 <div class="header-report">
        <h2>
            LFSHOP:REPORTE DE ORDEN
        </h2>
        <p>
            Fecha: {{($date)}}
        </p>
    </div>
    <div class="container text-center">
        <div class="page-header">
            <h1>DETALLE DE PEDIDO</h1>
        </div>
        <div>
            <div class="table-responsive">
                <h3>DATOS DEL USUARIO</h3>
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <td>NOMBRE:</td>
                        <td>{{$datav->user->fullname}}</td>
                    </tr>
                    <tr>
                        <td>EMAIL:</td>
                        <td>{{$datav->user->email}}</td>
                    </tr>
                    <tr>
                        <td>DIRECCION:</td>
                        <td>{{$datav->user->name}}</td>
                    </tr>
                    <tr>
                        <td>DNI:</td>
                        <td>{{$datav->user->dni}}</td>
                    </tr>


                </table>
            </div>
            <div class="table-responsive">
                <h3>DATOS DEL PEDIDO</h3>
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

                        @foreach($datav->products as $product)

                        <tr>
                            <td>{{$product->name}}</td>
                            <td>$ {{number_format($product->pivot->price,2)}}</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>$ {{number_format($product->pivot->price*$product->pivot->quantity,2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3>
                Total:${{number_format($datav->getTotal(),2)}}
            </h3>
                
            </div>
        </div>
    </div>

@endsection
