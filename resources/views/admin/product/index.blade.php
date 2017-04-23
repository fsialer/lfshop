@extends('admin.template.main') @section('content')

<div class="row text-center">
    <h1>PRODUCTOS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'product.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!}
    <a href="{{route('pdf.product')}}" target="_blank" class="btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar a pdf</a> @include('admin.product.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}

    <p>
        <a href="{{route('product.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Producto</a>
    </p>
</div>
<div class="row">
    <p>Hay {{$products->total()}} productos.</p>
</div>

<div class="row text-center">
    <div class="table-responsive">
        @include('admin.product.partials.table')

    </div>
    {!! $products->appends(Request::only(['name']))->render() !!}
</div>



@endsection