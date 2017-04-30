<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fanbase</title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">

    <!-- Include the CSS -->
    <link href="{{ asset('css/toolkit-inverse.min.css') }}" rel="stylesheet"> <!-- deze misschien aanpassen van dist uit asset? -->
    <link href="{{ asset('css/application.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    
    <div class="container">
        <div class="row">

            <div class="col-sm-12 content">
                @yield('content')                
            </div> <!-- /content -->

        </div> <!-- /row -->
    </div> <!-- /container -->

    <!-- Include jQuery (required) and the JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}} <!-- oude versie -->
    <script src="{{ asset('js/toolkit.min.js') }}"></script>
</body>
</html>
