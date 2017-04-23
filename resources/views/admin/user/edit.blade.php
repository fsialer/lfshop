@extends('admin.template.main') @section('content')

    <div class="col-md-6 well bs-component center-block no-float">
        {!!Form::open(['route'=>['user.update',$user],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>USUARIO [EDITAR USUARIO - {{$user->fullname}}]</legend>
            @include('admin.user.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('user.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>




@endsection