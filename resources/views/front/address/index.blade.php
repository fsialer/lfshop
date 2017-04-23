@extends('front.account.index') @section('content2')

    <a href="{{route('address.create')}}" class="btn btn-primary">Agregar Dirección</a>
    <div class="row">
        <div class="col-md-12">
            @foreach($addresses as $address)
            <div class="col-md-3  well bs-component">
                <p>{{$address->type}} {{$address->address}}{{$address->lot}}</p>
                <p>{{$address->city->name}}, {{$address->city->municipality->name}}, {{$address->city->municipality->region->name}}</p>
                <p>Telefono: {{$address->movil}}</p>
                <p>
                    <a href="{{route('address.edit',$address)}}" class="btn btn-warning">Editar</a>
                    <a href="{{route('address.destroy',$address)}}" class="btn btn-danger">Eliminar</a>
                </p>
            </div>

            @endforeach
        </div>
    </div>




@endsection