<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('store.index')}}">FShoP</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('store.index')}}">Store</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                @include('front.template.partials.menu-user')
            </ul>
        </div>
    </div>
</nav>