<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name',$type_product->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!!Form::label('description', 'Descripcion', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::textarea ('description',$type_product->description,['class' => 'form-control','id'=>'description','placeholder'=>'Descripción'])!!} @if ($errors->has('description'))
        <span class="help-block">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span> @endif
    </div>

</div>
