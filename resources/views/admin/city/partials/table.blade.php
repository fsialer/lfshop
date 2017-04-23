<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Region</th>
            <th>Provincia</th>
            <th>Nombre</th>
            <th>Visible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
           <td>{{$city->municipality->region->name}}</td>
           <td>{{$city->municipality->name}}</td>
            <td>{{$city->name}}</td>
            <td>{{$city->visible}}</td>
            <td>
                <a href="{{route('city.edit',$city)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('city.destroy',$city)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>