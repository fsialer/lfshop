@extends('admin.template.main') @section('content')


    <div class="col-md-12 well bs-component center-block no-float">

        {!!Form::open(['route'=>['subcategory.update',$subcategory],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>SUBCATEGORIAS [EDITAR SUBCATEGORIAS - {{$subcategory->name}}]</legend>
            @include('admin.subcategory.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('subcategory.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>


@endsection
