@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>USUARIOS</h1>
        <a href="{{route('user.create')}}" class="btn btn-primary">Registrar Usuario</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>{{$user->active}}</td>
                     <td>
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                         <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger">Eliminar</a>
                     </td>                      
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $users->render() !!}
    </div>
</div>

@endsection