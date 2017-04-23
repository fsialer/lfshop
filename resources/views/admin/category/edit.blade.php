@extends('admin.template.main') @section('content')

<div class="col-md-6 well bs-component center-block no-float">
    {!!Form::open(['route'=>['category.update',$category],'method'=>'PUT','class'=>'form-horizontal'])!!}
    <fieldset>
        <legend>CATEGORIA [EDITAR CATEGORIA - {{$category->name}}]</legend>
        @include('admin.category.partials.fields')
        <div class="form-group text-center">
            {!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
            <a href="{{route('category.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </fieldset>
    {!!Form::close()!!}
</div>

@endsection