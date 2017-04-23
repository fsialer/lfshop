@extends('admin.template.main') @section('content')

<div class="row text-center">
    <h1>Distritos</h1>

</div>

<div class="row">
    {!! Form::model(Request::all(),['route'=>'city.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.city.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
    <p>
        <a href="{{route('city.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Region</a>
    </p>
</div>
<div class="row">
    <p>Hay {{$cities->total()}} Provincias.</p>
</div>

<div class=" row text-center">
    <div class="table-responsive">
       @if($cities->total() > 0)
       @include('admin.city.partials.table')
        @else
        <span class="label label-default">No hay Distrito</span> 
        @endif
        

    </div>
    {!! $cities->appends(Request::all())->render() !!}
</div>



@endsection