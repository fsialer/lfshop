@extends('front.account.index') @section('content2')
<div class="col-md-8 well bs-component center-block no-float">
    {!!Form::open(['route'=>['account.change',Auth::user()],'method'=>'PUT','class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>CAMBIAR PASSWORD</legend>
        <div class="form-group {{ $errors->has('apassword') ? ' has-error' : '' }}">
            {!!Form::label('apassword', 'Contraseña Actual', ['class' => 'control-label col-md-2'])!!}
            <div class="col-md-10">
                {!!Form::password('apassword',['class' => 'form-control','id'=>'apassword','placeholder'=>'*************'])!!} @if ($errors->has('apassword'))
                <span class="help-block">
                        <strong>{{ $errors->first('apassword') }}</strong>
                    </span> @endif
            </div>

        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!!Form::label('password', 'Nueva Contraseña', ['class' => 'control-label col-md-2'])!!}
            <div class="col-md-10">
                {!!Form::password('password',['class' => 'form-control','id'=>'password','placeholder'=>'*************'])!!} @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
            </div>

        </div>

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!!Form::label('rnpassword', 'Repetir Nueva Contraseña', ['class' => 'control-label col-md-2'])!!}
            <div class="col-md-10">
                {!!Form::password('password_confirmation',['class' => 'form-control','id'=>'password_confirmation','placeholder'=>'*************'])!!} @if ($errors->has('password_confirmation'))
                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span> @endif
            </div>

        </div>
        <div class="form-group text-center">
            {!! Form::submit('GUARDAR CAMBIOS',['class'=>' btn btn-success']) !!}
            <a href="{{route('account.index')}}" class="btn btn-default">Regresar</a>
        </div>

    </fieldset>

    {!!Form::close()!!}
</div>

@endsection