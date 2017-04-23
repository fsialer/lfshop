@extends('admin.template.main') @section('content')



    <div class="col-md-7 well bs-component center-block no-float">

        {!!Form::open(['route'=>'image.store','method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>IMAGENES [AGREGAR IMAGENES]</legend>
            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                    {!! Form::label('image','Imagen',['class' => 'control-label col-md-2']) !!} 
                    <div class="col-md-10">
                        {!! Form::file('image[]',['id'=>'filer_input','multiple'=>'multiple']) !!}
                         @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span> 
                        @endif
                    </div>
                    
                </div>
            {!!Form::hidden('product_id',$id)!!}
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('image.show',$id)}}" class="btn btn-default">Cancelar</a>
            </div>

        </fieldset>


        {!!Form::close()!!}

    </div>



@endsection @section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#filer_input').filer({
            showThumbs: true,
            addMore: true,
            allowDuplicates: false
        });
    });
</script>
@endsection