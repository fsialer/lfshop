@extends('admin.template.main') @section('content')

    <div class="row text-center">
        <h1>USUARIOS</h1>
    </div>
    <div class="row">
        {!! Form::model(Request::all(),['route'=>'user.index','method'=>'GET','class'=>'navbar-form nav-left pull-right']) !!} @include('admin.user.partials.search') {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!} {!! Form::close() !!}
        <p> <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Usuario</a></p>
    </div>
    <div class="row">
        <p>Hay {{$users->total()}} usuarios.</p>
    </div>
    
    <div class="row text-center">
        <div class="table-responsive">
           @if($users->total() > 0) 
         @include('admin.user.partials.table')  
        @else
        <span class="label label-default">No hay Usuarios</span> 
        @endif       
           
        </div>
        {!! $users->appends(Request::only(['name']))->render() !!}
    </div>



@endsection