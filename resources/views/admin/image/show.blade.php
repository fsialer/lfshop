@extends('admin.template.main') @section('content')


    <div class=" text-center">
        <h1>ALBUM -{{$images->first()->product->name}}</h1>
        <a href="{{route('image.edit',$images->first()->product->id)}}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Imagen</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                <tr>
                    <td>
                        <div class="img-container">
                            <img class="img-responsive img-thumbnail" alt="Responsive image" src="{{asset('images/products/'.$image->name)}}" width="200">
                        </div>

                    </td>
                    <td>
                        <a href="{{route('image.destroy',$image->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {!! $images->render() !!}
    <hr>
    <a href="{{route('product.index')}}" class="btn btn-primary">Regresar</a>

@endsection