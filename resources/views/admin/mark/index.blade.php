@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>MARCAS</h1>
        <a href="{{route('mark.create')}}" class="btn btn-primary">Registrar Marca</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marks as $mark)
                <tr>
                    <td>{{$mark->name}}</td>
                    <td>{{$mark->description}}</td>
                     <td>
                        <a href="{{route('mark.edit',$mark->id)}}" class="btn btn-warning">Editar</a>
                         <a href="{{route('mark.destroy',$mark->id)}}" class="btn btn-danger">Eliminar</a>
                     </td>                      
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $marks->render() !!}
    </div>
</div>

@endsection