@extends('admin.template.main') @section('content')


    <div class="col-md-7 well bs-component center-block no-float">

        {!!Form::open(['route'=>['region.update',$region],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>PRODUCTO [EDITAR PRODUCTO - {{$region->name}}]</legend>
            @include('admin.region.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('region.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>


@endsection