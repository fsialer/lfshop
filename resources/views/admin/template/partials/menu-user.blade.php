@if(Auth::check())
   <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="">{{Auth::user()->name}}</a></li>
        <li><a href="">Pedidos</a></li>
        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesion</a></li>
    </ul>
    </li>
@else
    <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('login')}}">Iniciar Sesion</a></li>
    </ul>
    </li>
@endif