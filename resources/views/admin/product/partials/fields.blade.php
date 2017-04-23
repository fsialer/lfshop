<div class="row">
    <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }} col-md-4">
        {!!Form::label('category_id', 'Categoria', ['class' => 'control-label col-md-3'])!!}
        <div class="col-md-9">
            {!!Form::select('category_id',$categories,$product->subcategory->category_id,['class'=>'form-control chosen-category','id'=>'category_id']);!!} @if ($errors->has('category_id'))
            <span class="help-block">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span> @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('subcategory_id') ? ' has-error' : '' }} col-md-4">
        {!!Form::label('subcategory_id', 'SubCategoria', ['class' => 'control-label col-md-4'])!!}
        <div class="col-md-8">
            {!!Form::select('subcategory_id',$subcategories,$product->subcategory_id,['class'=>'form-control chosen-subcategory','id'=>'subcategory_id'])!!} @if ($errors->has('subcategory_id'))
            <span class="help-block">
                        <strong>{{ $errors->first('subcategory_id') }}</strong>
                    </span> @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('typeproduct_id') ? ' has-error' : '' }} col-md-4">
        {!!Form::label('typeproduct_id', 'Tipo de Producto', ['class' => 'control-label col-md-3'])!!}
        <div class="col-md-9">
            {!!Form::select('typeproduct_id',$typeproducts,$product->typeproduct_id,['class'=>'form-control chosen-typeproduct','id'=>'typeproduct_id'])!!} @if ($errors->has('typeproduct_id'))
            <span class="help-block">
                        <strong>{{ $errors->first('typeproduct_id') }}</strong>
                    </span> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group {{ $errors->has('mark_id') ? ' has-error' : '' }} col-md-3">
        {!!Form::label('mark_id', 'Marca', ['class' => 'control-label col-md-3'])!!}
        <div class="col-md-9">
            {!!Form::select('mark_id',$marks,$product->mark_id,['class'=>'form-control chosen-mark','id'=>'mark_id'])!!} @if ($errors->has('mark_id'))
            <span class="help-block">
                        <strong>{{ $errors->first('mark_id') }}</strong>
                    </span> @endif
        </div>
    </div>
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
        {!!Form::label('name', 'Nombre', ['class' => 'control-label col-md-2'])!!}
        <div class="col-md-10">
            {!!Form::text('name',$product->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!} @if ($errors->has('name'))
            <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span> @endif
        </div>

    </div>
    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} col-md-3">
        {!!Form::label('price', 'Precio', ['class' => 'control-label col-md-3'])!!}
        <div class="col-md-9">
            {!!Form::text ('price',$product->price,['class' => 'form-control','id'=>'price','placeholder'=>'Precio'])!!} @if ($errors->has('price'))
            <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span> @endif
        </div>
    </div>
</div>






<div class="form-group {{ $errors->has('extract') ? ' has-error' : '' }}">
    {!!Form::label('extract', 'Extraccion', ['class' => 'control-label col-md-1'])!!}
    <div class="col-md-10">
        {!!Form::textarea ('extract',$product->extract,['class'=>'form-control txt-area-content','placeholder'=>'Ingrese un Extraccion'])!!} @if ($errors->has('extract'))
        <span class="help-block">
                        <strong>{{ $errors->first('extract') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!!Form::label('description', 'Descripcion', ['class' => 'control-label col-md-1'])!!}
    <div class="col-md-10">
        {!!Form::textarea ('description',$product->description,['class'=>'form-control txt-area-content','placeholder'=>'Ingrese un Descripcion'])!!} @if ($errors->has('description'))
        <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span> @endif
    </div>

</div>
<div class="form-group">
    {!!Form::label('active', 'Activo', ['class' => 'control-label col-md-1'])!!}
    <div class="col-md-10 checkbox">
        {!!Form::checkbox('visible',null,$product->visible==1?true:false)!!}
    </div>

</div>



@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.txt-area-content').trumbowyg();
        $(".chosen-category").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una categoria',
            width: "100%"
        });
        $(".chosen-subcategory").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una Subcategoria',
            width: "100%"
        });
        $(".chosen-mark").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una marca',
            width: "100%"
        });
        $(".chosen-typeproduct").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una tipo de producto',
            width: "100%"
        });
        $(".chosen-category").on('change', function (evt, params) {
            $('.chosen-subcategory option').empty();
            $.get("{{route('ajax.subcategory')}}", {
                    category_id: params.selected
                },
                function (data) {
                    console.log(data);
                    for (var i in data) {
                        $(".chosen-subcategory").append("<option  value=" + i + ">" + data[i] + "</option>");

                    }
                    console.log('paso');
                    $('.chosen-subcategory').trigger('chosen:updated');
                });


        });

    });
</script>
@endsection