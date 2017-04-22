<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fanbase') }}</title>

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
            <div class="col-sm-3 sidebar">
                <nav class="sidebar-nav">
                    <div class="sidebar-header">
                        <button class="nav-toggler nav-toggler-sm sidebar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
                            <span class="sr-only">Toggle nav</span>
                        </button>
                        <a class="sidebar-brand img-responsive" href="/home">
                            <h1 class="text-muted"><span class="icon icon-database"></span> Fanbase</h1>
                        </a>
                    </div>

                    <div class="collapse nav-toggleable-sm" id="nav-toggleable-sm">
                        {{-- <form class="sidebar-form">
                            <input class="form-control" type="text" placeholder="Search...">
                            <button type="submit" class="btn-link">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </form> --}}
                        <ul class="nav nav-pills nav-stacked">
                            <li class="nav-header">Dashboards</li>
                            <li class="active">
                                <a href="index.html">Overview</a>
                            </li>
                            <li>
                                <a href="#">Users</a>
                            </li>
                            <li>
                                <a href="#">Playlists</a>
                            </li>

                            <li class="nav-header">Products</li>
                            <li>
                                <a target="_blank" href="/">
                                    Spotify connect
                                </a>
                            </li>

                            <li class="nav-header">Account</li>
                            <li>
                                <a href="#"> <!-- laten linken naar aanpassen account, of gewoon geen link -->
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        <hr class="visible-xs m-t">
                    </div>
                </nav>
            </div> <!-- sidebar -->

            <div class="col-sm-9 content">
                @yield('content')                
            </div> <!-- /content -->

        </div> <!-- /row -->
    </div> <!-- /container -->

    <!-- Include jQuery (required) and the JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/toolkit.min.js') }}"></script>
</body>
</html>
