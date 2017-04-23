@extends('admin.template.main') @section('content')

    <div class="text-center">
        <h1>PROVINCIAS</h1>

    </div>
    
    <div class="row">
        {!! Form::model(Request::all(),['route'=>'municipality.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!}
         @include('admin.municipality.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} 
         {!! Form::close() !!}        
        <p>
            <a href="{{route('municipality.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
 Agregar Provincia</a>
        </p>
    </div>
    <div class="row">
        <p>Hay {{$municipalities->total()}} Provincias.</p>
    </div>
    
    <div class=" text-center">
        <div class="table-responsive">
            @if($municipalities->total() > 0)
      @include('admin.municipality.partials.table')
        @else
        <span class="label label-default">No hay Provincias</span> 
        @endif
            

        </div>
        {!! $municipalities->appends(Request::only(['name']))->render() !!}
    </div>


@endsection