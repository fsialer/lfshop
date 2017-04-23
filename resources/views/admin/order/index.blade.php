@extends('admin.template.main') @section('content')

<div class="row text-center">
    <h1>PEDIDOS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'order.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.order.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
</div>
<div class="row">
    <p>Hay {{$orders->total()}} ordenes.</p>
</div>

<div class="row text-center">
    <div class="table-responsive">
        @if($orders->total() > 0) 
        @include('admin.order.partials.table') 
        @else
        <span class="label label-default">No hay PEDIDOS</span> 
        @endif       
    </div>
    {!! $orders->render() !!}
</div>



@endsection