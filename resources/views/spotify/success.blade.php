<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spotify index - Success!</title>
        <!-- webpack broken -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="/css/spotify.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:500,700" rel="stylesheet">
    </head>
    <body>
        
        <div class="container-fluid hero-wrapper">
            <div class="container header-wrapper">

                <div class="text-center main-logo">
                    <img src="/images/main-logo-white.png">
                </div> <!-- main-logo -->

                <div class="text-center main-copy">
                    <h1><i class="fa fa-check-circle-o" aria-hidden="true"></i> Thanks for following me!</h1>
                    <h3>You're now the first to hear my brand new music</h3>
                    <a href="#" class="btn btn-lg btn-success">Listen now</a>
                </div>

                <div class="main-phone text-center">
                    <img src="/images/following-yes.png">
                </div>

            </div>  <!-- hero-wrapper -->
        </div> <!-- hero-wrapper -->

        <div class="container-fluid footer-wrapper">
            <div class="container footer-content">
                <div class="text-center latest-releases-copy">

                    <img src="/images/avatar.png">

                    <h2>Latest Releases</h2>
                </div> <!-- latest-releases-copy -->

                <div class="latest-releases-covers">
                    @foreach($albums->items as $album)
                    <div class="col-lg-3 col-md-4 col-xs-12 thumb">
                        <a target="_blank" class="thumbnail" href="{{ $album->external_urls->spotify }}">
                            <img class="img-responsive" src="{{ $album->images[0]->url }}" alt="">
                        </a>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div> <!-- latest-releases-covers -->

            </div> <!-- footer-content -->
        </div> <!-- footer-wrapper -->

    </body>
</html>

<!-- rows tussen cols en containers -->
