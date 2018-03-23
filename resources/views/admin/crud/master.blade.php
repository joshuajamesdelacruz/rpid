<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <script type="text/javascript" src="{{ asset('public/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/bootstrap.js') }}"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD Operations</title>

        <!-- Fonts -->
        <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        @include('admin.layouts.app')
        
    </head>
    <body>


          

        <br><br>
        @yield('content')
    </body>
      
</html>