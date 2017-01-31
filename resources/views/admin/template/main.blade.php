<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FShoP-Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<!--    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">-->
</head>
<body>
   @if(\Session::has('message'))
        @include('admin.template.partials.message')
    @endif
    @include('admin.template.partials.header')
    
    @yield('content')
    @include('admin.template.partials.footer')    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
<!--    <script src="{{asset('plugins/jquery/js/jquery-2.2.3.js')}}"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>-->
    <script src="{{asset('js/main.js')}}"></script>    
</body>
</html>