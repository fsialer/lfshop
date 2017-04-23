@extends('admin.template.main') @section('content')
<div class="row text-center">
    <h1>SUBCATEGORIAS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'subcategory.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.subcategory.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
    <p>
        <a href="{{route('subcategory.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar SubCategoria</a>
    </p>
</div>
<div class="row">
    <p>Hay {{$subcategories->total()}} subcategorias.</p>
</div>
<div class="row text-center">

    <div class="table-responsive">
        @if($subcategories->total() > 0) 
        @include('admin.subcategory.partials.table') 
        @else
        <span class="label label-default">No hay SubCategorias</span> 
        @endif
    </div>
    {!! $subcategories->appends(Request::only(['name']))->render() !!}
</div>
@endsection