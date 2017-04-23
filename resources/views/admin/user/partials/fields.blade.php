<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name',$user->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
    {!!Form::label('last_name', 'Apellido', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('last_name',$user->last_name,['class' => 'form-control','id'=>'last_name','placeholder'=>'Apellido'])!!} @if ($errors->has('last_name'))
        <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('dni') ? ' has-error' : '' }}">
    {!!Form::label('dni', 'dni', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('dni',$user->dni,['class' => 'form-control','id'=>'dni','placeholder'=>'dni'])!!} 
        @if ($errors->has('dni'))
        <span class="help-block">
                        <strong>{{ $errors->first('dni') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('sex') ? ' has-error' : '' }}">
    {!!Form::label('sex', 'Sexo', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        <div class="radio">
            <label for="sex">
                {!!Form::radio('sex', 'male', $user->sex=='male'?true:false,['for'=>'sex'])!!} Masculino
            </label>
        </div>
        <div class="radio">
            <label>
                {!!Form::radio('sex', 'female', $user->sex=='female'?true:false,['for'=>'sex'])!!} Femenino
            </label>
        </div>
        @if ($errors->has('sex'))
        <span class="help-block">
                        <strong>{{ $errors->first('sex') }}</strong>
                    </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!!Form::label('email', 'Email', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::email('email',$user->email,['class' => 'form-control','id'=>'email','placeholder'=>'Email'])!!} @if ($errors->has('email'))
        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
    {!!Form::label('password', 'Contraseña', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::password('password',['class' => 'form-control','id'=>'password','placeholder'=>'*************'])!!} @if ($errors->has('password'))
        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span> @endif
    </div>

</div>

<div class="form-group">
    {!!Form::label('active', 'Activo', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10 checkbox">
        {!!Form::checkbox('active',null,$user->active==1?true:false)!!}
    </div>

</div>
