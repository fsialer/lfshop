<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Categoria</th>
            <th>SubCategoria</th>
            <th>Album</th>
            <th>Nombres</th>
            <th>Precio</th>
            <th>Visible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->subcategory->category->name}}</td>
             <td>{{$product->subcategory->name}}</td>
            <td>
                <a href="{{route('image.show',$product->id)}}" class="btn btn-info">Ver</a>
            </td>
            <td>{{$product->name}}</td>
            <td>${{number_format($product->price,2)}}</td>
            <td>{{$product->visible}}</td>
            <td>
                <a href="{{route('product.edit',$product->slug)}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="{{route('product.destroy',$product->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>