<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.home')}}">FShoP</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right text-right">                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{route('admin.home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> PRODUCTOS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('category.index')}}">Categorias</a>
                                </li>
                                <li>
                                    <a href="{{route('subcategory.index')}}">Sub-Categoria</a>
                                </li>
                                <li>
                                    <a href="{{route('mark.index')}}">Marcas</a>
                                </li>
                                <li>
                                    <a href="{{route('typeproduct.index')}}">Tipo de Productos</a>
                                </li>
                                <li>
                                    <a href="{{route('product.index')}}">Productos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="{{route('order.index')}}"><i class="fa fa-cc-paypal fa-fw"></i> PEDIDOS</a>
                            
                            
                        </li>
                        <li>
                            <a href="{{route('user.index')}}"><i class="fa fa-users fa-fw"></i> USUARIOS</a>
                            
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i>MANTENIMIENTO<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('region.index')}}">Regiones</a>
                                </li>
                                <li>
                                    <a href="{{route('municipality.index')}}">Provincia</a>
                                </li>
                                <li>
                                    <a href="{{route('city.index')}}">Distrito</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
