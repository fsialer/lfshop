@extends('front.account.index') 
@section('content2')

<div class="col-md-12 well bs-component left-block no-float">
    {!!Form::open(['route'=>['account.update',Auth::user()],'method'=>'PUT','class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>MIS DATOS PERSONALES</legend>
        <div class="row">
            <div class="form-group {{ $errors->has('name') ? ' has-error' : ''}}  col-md-6">
                {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('name',Auth::user()->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }} col-md-6">
                {!!Form::label('last_name', 'Apellido', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('last_name',Auth::user()->last_name,['class' => 'form-control','id'=>'last_name','placeholder'=>'Apellido'])!!} @if ($errors->has('last_name'))
                    <span class="help-block">
<strong>{{ $errors->first('last_name') }}</strong>
</span> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group {{ $errors->has('dni') ? ' has-error' : '' }} col-md-6">
                {!!Form::label('dni', 'dni', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('dni',Auth::user()->dni,['class' => 'form-control','id'=>'dni','placeholder'=>'dni','disabled'=>'true'])!!} @if ($errors->has('dni'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group {{ $errors->has('sex') ? ' has-error' : '' }} col-md-6">
                {!!Form::label('sex', 'Sexo', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    <div class="radio col-md-6">
                        <label for="sex">
                            {!!Form::radio('sex', 'masculino', Auth::user()->sex=='masculino'?true:false,['for'=>'sex'])!!} Masculino
                        </label>
                    </div>
                    <div class="radio col-md-6">
                        <label>
                            {!!Form::radio('sex', 'femenino', Auth::user()->sex=='femenino'?true:false,['for'=>'sex'])!!} Femenino
                        </label>
                    </div>
                    @if ($errors->has('sex'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sex') }}</strong>
                    </span> @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                {!!Form::label('email', 'Email', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::email('email',Auth::user()->email,['class' => 'form-control','id'=>'email','placeholder'=>'Email','disabled'=>'true'])!!} @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                </div>

            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('GUARDAR CAMBIOS',['class'=>' form-control btn btn-success']) !!}
        </div>
        
        







    </fieldset>


    {!!Form::close()!!}
</div>
<div class="row col-md-6">
            <a href="{{route('account.recovery',Auth::user()->id)}}" class="btn btn-warning">CAMBIAR CONTRASEÑA</a>
        </div>
@endsection