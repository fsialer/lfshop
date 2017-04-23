@extends('admin.template.main') @section('content')


    <div class="col-md-7 well bs-component center-block no-float">

        {!!Form::open(['route'=>['municipality.update',$municipality],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>PROVINCIAS [EDITAR PROVINCIA - {{$municipality->name}}]</legend>
            @include('admin.municipality.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('municipality.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>


@endsection