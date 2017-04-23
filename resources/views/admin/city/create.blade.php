@extends('admin.template.main') 
@section('content')

    <div class="col-md-7 well bs-component center-block no-float">
        {!!Form::open(['route'=>'city.store','method'=>'POST','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>DISTRITOS [AGREGAR DISTRITO]</legend>                
            @include('admin.city.partials.form')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('city.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection