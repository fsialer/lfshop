<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name',$region->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
    </div>

</div>
   <div class="form-group">
    {!!Form::label('active', 'Activo', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10 checkbox">
        {!!Form::checkbox('visible',null,$region->visible==1?true:false)!!}
    </div>

</div>