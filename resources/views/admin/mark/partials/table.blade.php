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
                <a href="{{route('mark.edit',$mark->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('mark.destroy',$mark->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>