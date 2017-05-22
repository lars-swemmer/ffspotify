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
            
               <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand navbar-brand-emphasized" href="/home">
                         <span class="icon icon-database"></span>
                          Fanbase
                        </a>
                      </div>
                      <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::is( 'home') ? 'active' : '' }}">
                                <a href="home">Overview</a>
                            </li>
                            <li class="{{ Request::is( 'users') ? 'active' : '' }}">
                                <a href="users">Fans</a>
                            </li>
                            <li>
                                <a target="_blank" href="/">
                                    Product page
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(Auth::user())
                            <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                      </div>
                    </div>
                  </nav>
            

            <div class="col-sm-12 content m-t-lg">
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
