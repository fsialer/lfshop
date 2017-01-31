@extends('admin.template.main') @section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>Productos <smal>[Agregar producto]</smal></h1>
    </div>(
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="page">
                @if(count($errors)>0) @include('admin.template.partials.error') @endif {!!Form::open(['route'=>'product.store','method'=>'POST','files'=>true])!!}
                <div class="form-group">
                    {!!Form::label('category_id', 'Categoria', ['class' => ''])!!} {!!Form::select('category_id',$categories,null,['class'=>'form-control','id'=>'category_id']);!!}
                </div>
                <div class="form-group">
                    {!!Form::label('mark_id', 'Marca', ['class' => ''])!!} {!!Form::select('mark_id',$marks,null,['class'=>'form-control','id'=>'mark_id']);!!}
                </div>
                <div class="form-group">
                    {!!Form::label('name', 'Nombre', ['class' => ''])!!} {!!Form::text('name','',['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('image','Imagen') !!} 
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group">
                    {!!Form::label('description', 'Descripcion', ['class' => ''])!!} {!!Form::textarea ('description','',['class' => 'form-control','id'=>'description','placeholder'=>'Descripción'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('extract', 'Extraccion', ['class' => ''])!!} {!!Form::textarea ('extract','',['class' => 'form-control','id'=>'extract','placeholder'=>'Extraccion'])!!}
                </div>
                <div class="form-group">
                    {!!Form::label('price', 'Precio', ['class' => ''])!!} {!!Form::text ('price','',['class' => 'form-control','id'=>'price','placeholder'=>'Precio'])!!}
                </div>
                <div class="form-group texto-derecha">
                    {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                    <a href="{{route('product.index')}}" class="btn btn-default">Cancelar</a>
                </div>

                {!!Form::close()!!}
            </div>
        </div>

    </div>
</div>



@endsection