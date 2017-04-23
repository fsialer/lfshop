<table class="table table-striped table-hover ">
    <thead>
        <tr>
            
            <th>Nombres</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($type_products as $type_product)
        <tr>
           
            <td>{{$type_product->name}}</td>
            <td>{{$type_product->description}}</td>
            <td>
                <a href="{{route('typeproduct.edit',$type_product->id)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('typeproduct.destroy',$type_product->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>