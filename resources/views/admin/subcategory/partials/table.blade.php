<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subcategories as $subcategory)
        <tr>
            <td>{{$subcategory->category->name}}</td>
            <td>{{$subcategory->name}}</td>
            <td><img src="{{asset('images/subcategories/'.$subcategory->image)}}" alt="" width="40"></td>
            <td>{{$subcategory->description}}</td>
            <td>
                <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('subcategory.destroy',$subcategory->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>