@extends('admin.template.main') 
@section('content')

    <div class="col-md-7 well bs-component center-block no-float">
        {!!Form::open(['route'=>'region.store','method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>REGIONES [AGREGAR REGION]</legend>                
            @include('admin.region.partials.form')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('region.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection