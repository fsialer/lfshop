@extends('front.template.main') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 center-block no-float">
            @include('front.template.partials.error')
            <div class="panel panel-default">
                <div class="panel-heading">INICIAR SESIÓN</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email"> @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password"> @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : ''}}> Recordar
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Olvidastes tu contraseña?
                                </a>
                            </div>

                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-lock fa-2x" aria-hidden="true"></i> INICIAR SESIÓN SEGURA
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="{{ url('/register')}}" class="btn btn-success">CREAR UNA CUENTA</a>

        </div>
    </div>

</div>
@endsection