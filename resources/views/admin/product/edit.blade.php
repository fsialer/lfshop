@extends('admin.template.main') @section('content')


    <div class="col-md-12 well bs-component center-block no-float">

        {!!Form::open(['route'=>['product.update',$product->slug],'method'=>'PUT','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>PRODUCTO [EDITAR PRODUCTO - {{$product->name}}]</legend>
            @include('admin.product.partials.fields')
            <div class="form-group text-center">
                {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
                <a href="{{route('product.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}

    </div>


@endsection
