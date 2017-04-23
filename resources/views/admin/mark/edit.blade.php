@extends('admin.template.main') @section('content')

    <div class="col-md-6 well bs-component center-block no-float">
        {!!Form::open(['route'=>['mark.update',$mark],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>MARCA [AGREGAR MARCA]</legend>
            @include('admin.mark.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('mark.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>




@endsection