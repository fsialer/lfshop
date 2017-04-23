<div class="form-group">
    {!!Form::select('category',$categories,null,['class'=>'form-control chosen-category','id'=>'category_id'])!!} 
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar SubCategoria..']) !!}
</div>
@section('js')
<script type="text/javascript">
    $(".chosen-category").chosen({
        allow_single_deselect: true,
        placeholder_text_single: 'Elije una categoria',
        width: "33%"
    });
   
    
</script>
@endsection