<div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
    {!!Form::label('region_id', 'Region', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::select('region_id',$regions,$municipality->region_id,['class'=>'form-control chosen-region','id'=>'region_id'])!!} 
        @if ($errors->has('region_id'))
        <span class="help-block">
                        <strong>{{ $errors->first('region_id') }}</strong>
                    </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name',$municipality->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
    </div>

</div>
   <div class="form-group">
    {!!Form::label('active', 'Activo', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10 checkbox">
        {!!Form::checkbox('visible',null,$municipality->visible==1?true:false)!!}
    </div>

</div>
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $(".chosen-region").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una region',
            width: "100%"
        });
    });
</script>
@endsection