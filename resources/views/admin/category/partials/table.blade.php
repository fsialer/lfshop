<table class="table table-striped table-hover">
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
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>