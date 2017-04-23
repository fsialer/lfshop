<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
    {!!Form::label('category_id', 'Categoria', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::select('category_id',$categories,null,['class'=>'form-control chosen-category','id'=>'category_id'])!!} @if ($errors->has('category_id'))
        <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::text('name','',['class' => 'form-control ','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
        <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
    </div>
</div>
<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image','Imagen',['class' => 'control-label col-md-2']) !!}
    <div class="col-md-10">
        {!! Form::file('image',['id'=>'filer_input']) !!} @if ($errors->has('image'))
        <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!!Form::label('description', 'Descripcion', ['class' => 'control-label col-md-2'])!!}
    <div class="col-md-10">
        {!!Form::textarea ('description','',['class' => 'form-control','id'=>'description','placeholder'=>'Descripción'])!!} @if ($errors->has('description'))
        <span class="help-block">
                             <strong>{{ $errors->first('description') }}</strong>
                        </span> @endif
    </div>

</div>
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#filer_input').filer({
            limit: 3,
            maxSize: 3,
            extensions: ["jpg", "png", "gif"],
            showThumbs: true
        });
        $(".chosen-category").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una categoria',
            width: "100%"
        });

    });
</script>
@endsection