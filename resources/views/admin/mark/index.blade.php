@extends('admin.template.main') @section('content')

<div class="row text-center">
    <h1>MARCAS</h1>
</div>
<div class="row">
    {!! Form::model(Request::all(),['route'=>'mark.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.mark.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
    <p><a href="{{route('mark.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Marca</a></p>
</div>
<div class="row">
    <p>Hay {{$marks->total()}} marcas.</p>
</div>

<div class="row text-center">
    <div class="table-responsive">
       @if($marks->total() > 0)
        @include('admin.mark.partials.table')
        @else
        <span class="label label-default">No hay Marcas</span> 
        @endif
    </div>
    {!! $marks->appends(Request::only(['name']))->render() !!}
</div>


@endsection