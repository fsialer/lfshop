<div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
    {!!Form::label('region_id', 'Region', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::select('region_id',$regions,null,['class'=>'form-control chosen-region region_id','id'=>'region_id'])!!} @if ($errors->has('region_id'))
        <span class="help-block">
                        <strong>{{ $errors->first('region_id') }}</strong>
                    </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('municipality_id') ? ' has-error' : '' }}">
    {!!Form::label('municipality_id', 'Provincia', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::select('municipality_id',[],null,['class'=>'form-control chosen-municipality','id'=>'municipality_id'])!!} @if ($errors->has('municipality_id'))
        <span class="help-block">
                        <strong>{{ $errors->first('municipality_id') }}</strong>
                    </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name','',['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
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
        $(".chosen-municipality").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una Provincia',
            width: "100%"
        });

        $(".chosen-region").on('change', function (evt, params) {
            $('.chosen-municipality option').empty();
            $.get("{{route('ajax.municipality')}}", {
                    region_id: params.selected
                },
                function (data) {                
                    console.log(data);
                    for (var i in data) {
                        $(".chosen-municipality").append("<option  value=" + i + ">" + data[i] + "</option>");
                         
                    }
                   console.log('paso');
                    $('.chosen-municipality').trigger('chosen:updated');
                });

            
        });
    });
</script>
@endsection