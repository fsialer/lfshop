<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin.home')}}">FShoP</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <p class="navbar-text"> <i class="fa fa-tachometer fa-1x" aria-hidden="true"></i>DashBoard</p>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('category.index')}}">Categorias</a></li>
                        <li><a href="{{route('mark.index')}}">Marcas</a></li>
                        <li><a href="{{route('product.index')}}">Productos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-truck fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('order.index')}}">Pedidos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-o fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('user.index')}}">Usuarios</a></li>
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="">{{Auth::user()->name}}</a></li>
                        <li><a href="{{route('logout')}}">Cerrar Sesion</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>