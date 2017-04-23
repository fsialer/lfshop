<div class="form-group">
   {!!Form::select('type',[''=>'','admin'=>'admin','usuario'=>'usuario'],null,['class'=>'form-control chosen-type','id'=>'category_id'])!!} 
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar nombres..']) !!}
</div>
@section('js')
<script type="text/javascript">
    $(".chosen-type").chosen({
        allow_single_deselect: true,
        placeholder_text_single:'Tipo usuario',
        width:"37%"
    });
</script>
@endsection
