@extends('admin.template.main') @section('content')
<div class="row text-center">
    <h1>CATEGORIAS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'category.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.category.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
    <p>
        <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Categoria</a>
    </p>
</div>
<div class="row">
    <p>Hay {{$categories->total()}} categorias.</p>
</div>
<div class="row text-center">
    
    <div class="table-responsive">
       @if($categories->total() > 0)
        @include('admin.category.partials.table')
          @else
    <span class="label label-default">No hay Categorias</span> 
    @endif 
    </div>
  
    {!! $categories->appends(Request::only(['name']))->render() !!}
</div>
@endsection