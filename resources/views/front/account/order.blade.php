@extends('front.account.index') @section('content2')

<div class="page-header text-center">
    <h1>PEDIDOS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'order.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!}
    <div class="form-group">
        {!!Form::date('date_start', null,['class'=>'form-control'])!!} {!!Form::date('date_finish', null,['class'=>'form-control'])!!}
    </div>
    {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
</div>
<p>Hay {{$orders->total()}} ordenes.</p>
<div class="text-center">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    
                    <th>Fecha</th>
                    <th>Subtotal</th>
                    <th>Envio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->subtotal}}</td>
                    <td>{{$order->shipping}}</td>
                    <td>{{$order->subtotal+$order->shipping}}</td>
                    <td>
                        <a href="{{route('account.detail',[$order,$order->user_id])}}" class="btn btn-info"><i class="fa fa-info" aria-hidden="true"></i></a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection