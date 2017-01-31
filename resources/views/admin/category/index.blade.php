@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>CATEGORIAS</h1>
        <a href="{{route('category.create')}}" class="btn btn-primary">Registrar Categoria</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Slugs</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->description}}</td>
                     <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning">Editar</a>
                         <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger">Eliminar</a>
                     </td>                      
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>
</div>

@endsection