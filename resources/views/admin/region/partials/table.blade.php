<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Visible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($regions as $region)
        <tr>
            <td>{{$region->name}}</td>
            <td>{{$region->visible}}</td>
            <td>
                <a href="{{route('region.edit',$region)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('region.destroy',$region)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>