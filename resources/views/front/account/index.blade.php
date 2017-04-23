@extends('front.template.main') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="">PERFIL</a>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{route('account.index')}}">Mis Datos Personales</a></li>
                        <li><a href="{{route('address.index')}}">Mis Direcciones</a></li>
                    </ul>
                </li>
                <li><a href="{{route('account.order',Auth::user()->id)}}">PEDIDOS</a></li>

            </ul>
        </div>
        <div class="col-md-9">
           @include('flash::message')
            @yield('content2')
        </div>
    </div>


</div>
@endsection