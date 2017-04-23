<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>FShoP-Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-gv0oNvwnqzF6ULI9TVsSmnULNb3zasNysvWwfT/s4l8k5I+g6oFz9dye0wg3rQ2Q" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('plugins/Trumbowyg/ui/trumbowyg.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/Filer/css/jquery.filer.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/Filer/css/themes/jquery.filer-dragdropbox-theme.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/chosen/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/metisMenu/metisMenu.css')}}">
    <!--    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">-->
</head>

<body>
    @if(\Session::has('message')) @include('admin.template.partials.message') @endif
    <div id="wrapper">
        @include('admin.template.partials.header')
        <div id="page-wrapper">
            @include('flash::message') @yield('content')
            @include('admin.template.partials.footer')
        </div>
       
        <!-- /#page-wrapper -->

    </div>
     
    <!-- /#wrapper -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{asset('plugins/Trumbowyg/trumbowyg.min.js')}}"></script>
    <script src="{{asset('plugins/Filer/js/jquery.filer.min.js')}}"></script>
    <script src="{{asset('plugins/chosen/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.js')}}"></script>
    <script src="{{asset('plugins/metisMenu/metisMenu.js')}}"></script>
    @yield('js')
</body>

</html>