@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>PRODUCTOS</h1>
        <a href="{{route('product.create')}}" class="btn btn-primary">Registrar Producto</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                   <th>Categoria</th>
                   <th>Marca</th>
                   <th>Imagen</th>
                    <th>Nombres</th>
                    <th>Slugs</th>
                    <th>Descripcion</th>
                    <th>Extraccion</th>
                    <th>Precio</th>
                    <th>Visible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>                
                    <td>{{$product->category->name}}</td>  
                               
                   <td>{{$product->mark->name}}</td>
                    <td>
                    @foreach($product->images as $image)
                    
                    <img src="{{asset('images/products/'.$image->name)}}" alt="" width="50"> 
                    @endforeach
                    </td>    
                   <td>{{$product->name}}</td>
                   <td>{{$product->slug}}</td>
                   <td>{{$product->description}}</td>
                    <td>{{$product->extract}}</td>
                    <td>${{number_format($product->price,2)}}</td>
                    <td>{{$product->visible}}</td>
                     <td>
                        <a href="{{route('product.edit',$product->slug)}}" class="btn btn-warning">Editar</a>
                        <a href="{{route('product.destroy',$product->id)}}" class="btn btn-danger">Eliminar</a>
                     </td>                      
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
</div>

@endsection