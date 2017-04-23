<div class="form-group">
    
    {!!Form::select('region_id',$regions,null,['class'=>'form-control chosen-region','id'=>'region_id'])!!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar Provincia..']) !!}
</div>
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $(".chosen-region").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una region',
            width: "40%"
        });
    });
</script>
@endsection