@extends('admin.template.main') 
@section('content')

    <div class="col-md-7 well bs-component center-block no-float">
        {!!Form::open(['route'=>'municipality.store','method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>PROVINCIAS [AGREGAR PROVINCIA]</legend>                
            @include('admin.municipality.partials.form')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('municipality.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection