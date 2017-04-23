@extends('admin.template.main') @section('content')

<div class="col-md-6 well bs-component center-block no-float">
    {!!Form::open(['route'=>['typeproduct.update',$type_product],'method'=>'PUT','class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>TIPO DE PRODUCTOS [EDITAR TIPO DE PRODUCTO - {{$type_product->name}}]</legend>
        @include('admin.type_product.partials.fields')
        <div class="form-group text-center">
            {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
            <a href="{{route('typeproduct.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>

@endsection