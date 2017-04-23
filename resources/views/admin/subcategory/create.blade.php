@extends('admin.template.main') @section('content')

<div class="col-md-6 well bs-component center-block no-float">
    {!!Form::open(['route'=>'subcategory.store','method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>SUBCATEGORIA [AGREGAR SUBCATEGORIA]</legend>
        @include('admin.subcategory.partials.form')
        <div class="form-group text-center">
            {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
            <a href="{{route('subcategory.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>




@endsection