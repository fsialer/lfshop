<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Region</th>
            <th>Nombre</th>
            <th>Visible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($municipalities as $municipality)
        <tr>
           <td>{{$municipality->region->name}}</td>
            <td>{{$municipality->name}}</td>
            <td>{{$municipality->visible}}</td>
            <td>
                <a href="{{route('municipality.edit',$municipality)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('municipality.destroy',$municipality)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>