<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>dni</th>
            <th>sexo</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->fullname}}</td>
            <td>{{$user->dni}}</td>
            <td>{{$user->sex}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->type}}</td>
            <td>{{$user->active}}</td>
            <td>
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('user.destroy',$user->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>