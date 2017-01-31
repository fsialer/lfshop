@extends('admin.template.main')
@section('content')
  <div class="container text-center">
        <div class="page-header">
            <h1><i class="fa fa-rocket"></i> MY STORE - DASHBOARD</h1>
        </div>
        
        <h2>Bienvenido(a) {{ Auth::user()->user }} al Panel de administración de tu tienda en línea.</h2><hr>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-list-alt fa-5x"></i>
                    <a href="{{ route('category.index') }}" class="btn btn-warning btn-block btn-home-admin">CATEGORÍAS</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-shopping-cart  fa-5x"></i>
                    <a href="{{ route('product.index') }}" class="btn btn-warning btn-block btn-home-admin">PRODUCTOS</a>
                </div>
            </div>
                    
        </div>
        
        <div class="row">
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-cc-paypal  fa-5x"></i>
                    <a href="{{ route('order.index') }}" class="btn btn-warning btn-block btn-home-admin">PEDIDOS</a>
                </div>
            </div> 
            
            <div class="col-md-6">
                <div class="panel">
                    <i class="fa fa-users fa-5x"></i>
                    <a href="{{ route('user.index') }}" class="btn btn-warning btn-block btn-home-admin">USUARIOS</a>
                </div>
            </div>
                    
        </div>
        
    </div>
    <hr>
@endsection