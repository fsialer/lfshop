@extends('admin.template.main') @section('content')

<div class="row text-center">
    <h1>TIPO DE PRODUCTO</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'typeproduct.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.type_product.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
    <p><a href="{{route('typeproduct.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Tipo de Producto</a></p>
</div>
<div class="row">
    <p>Hay {{$type_products->total()}} tipo de productos.</p>
</div>

<div class="row text-center">
    <div class="table-responsive">
       @if($type_products->total() > 0)
        @include('admin.type_product.partials.table')
        @else
        <span class="label label-default">No hay Tipo de Productos</span> 
        @endif
    </div>
    {!! $type_products->appends(Request::only(['name']))->render() !!}
</div>


@endsection