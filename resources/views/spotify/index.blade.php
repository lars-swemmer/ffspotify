<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Spotify index</title>
        <!-- webpack broken -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="/css/spotify.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row main-header">
                <div class="col-md-12">
                    <div>
                        <img src="http://www.purplepandamedia.com/wp-content/uploads/2015/03/spotify.jpg" height="40">
                    </div>
                </div>
            </div>
            <div class="row main-content">
                <div class="col-md-6">
                    <div class="artwork">
                        <img src="https://u.scdn.co/images/pl/default/651ec36242608e43f6fd96792a7869194420247a">
                    </div>
                    <a class="btn btn-default" href="#" role="button">Follow Playlist</a>
                </div>
                <div class="col-md-6">Songs</div>
            </div>
        </div>
    </body>
</html>
