@extends('admin.template.main') @section('content')


    <div class="col-md-6 well bs-component center-block no-float">

        {!!Form::open(['route'=>'user.store','method'=>'POST','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>USUARIO [AGREGAR USUARIO]</legend>
            @include('admin.user.partials.form')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('user.index')}}" class="btn btn-default">Cancelar</a>
            </div>

        </fieldset>

        {!!Form::close()!!}

    </div>

</div>




@endsection