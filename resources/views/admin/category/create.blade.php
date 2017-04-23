@extends('admin.template.main') @section('content')

<div class="col-md-6 well bs-component center-block no-float">
    {!!Form::open(['route'=>'category.store','method'=>'POST','class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>CATEGORIA [AGREGAR CATEGORIA]</legend>
        @include('admin.category.partials.form')
        <div class="form-group text-center">
            {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
            <a href="{{route('category.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>




@endsection