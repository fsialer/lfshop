@extends('admin.template.main') @section('content')

    <div class="col-md-12 well bs-component center-block no-float">
        {!!Form::open(['route'=>'product.store','method'=>'POST','files'=>true,'class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>PRODUCTO [AGREGAR PRODUCTO]</legend>                
            @include('admin.product.partials.form')
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('product.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection