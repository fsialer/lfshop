@extends('admin.pdf.index')

@section('content')
<div class="text-center">
        <h2>
            LFSHOP:REPORTE DE PRODUCTOS
        </h2>
        <p>
            Fecha: {{($date)}}
        </p>
    </div>
     <table class="table table-hover">
     <thead>
          <tr>
            <th>CATEGORIA</th>
            <th>MARCA</th>
            <th>TIPO PRODUCTO</th>
            <th>NOMBRE DEL ARTICULO</th>
            <th>STOCK</th>
        </tr>
     </thead>
     <tbody>
         @foreach($datav as $product)
        <tr>
           <td>{{$product->subcategory->category->name}}/{{$product->subcategory->name}}</td>
           <td>{{$product->mark->name}}</td>
           <td>{{$product->typeproduct->name}}</td>
           
            <td>{{$product->name}}</td>
            <td>$ {{$product->price}}</td>
        </tr>
        @endforeach
     </tbody>
       
        
        
    </table>
@endsection
