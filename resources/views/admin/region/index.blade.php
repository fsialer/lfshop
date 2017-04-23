@extends('admin.template.main') @section('content')

    <div class="text-center">
        <h1>REGIONES</h1>

    </div>
    
    <div class="row">
        {!! Form::model(Request::all(),['route'=>'region.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!}
         @include('admin.region.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} 
         {!! Form::close() !!}        
        <p>
            <a href="{{route('region.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Region</a>
        </p>
    </div>
    <div class="row">
        <p>Hay {{$regions->total()}} regiones.</p>
    </div>
    
    <div class=" text-center">
        <div class="table-responsive">
           @if($regions->total() > 0)
       @include('admin.region.partials.table')
        @else
        <span class="label label-default">No hay Regiones</span> 
        @endif
            

        </div>
        {!! $regions->appends(Request::only(['name']))->render() !!}
    </div>


@endsection