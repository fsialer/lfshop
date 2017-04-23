@if(Auth::check())
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-o fa-2x" aria-hidden="true"></i></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{route('account.index')}}">{{Auth::user()->name}}</a></li>
        <li><a href="{{route('account.order',Auth::user()->id)}}">Pedidos</a></li>
        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesion</a></li>
    </ul>
</li>
@else
<li>
    <a href="{{route('login')}}">Log in</a>
</li>
@endif