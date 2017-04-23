@extends('admin.template.main') 
@section('content')

    <div class="col-md-7 well bs-component center-block no-float">
        {!!Form::open(['route'=>['city.update',$city],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>DISTRITOS [EDITAR DISTRITO - {{$city->name}}]</legend>                
            @include('admin.city.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('city.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection