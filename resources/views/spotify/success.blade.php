<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>R3HAB - {{ config('app.name') }}</title>
        <!-- webpack broken -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="/css/spotify.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:500,700" rel="stylesheet">

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '120173675238617'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=120173675238617&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->

        <!-- Google Code for Remarketing Tag -->
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 849670675;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/849670675/?guid=ON&amp;script=0"/>
        </div>
        </noscript>
    </head>
    <body>
        
          @if (session('completed_steps'))
            <!-- fb conversion -->
            <script> fbq('track', 'SpotifyReleaseSubscription'); </script>

            <!-- Google Code for Spotify follow R3HAB night Conversion Page -->
            <script type="text/javascript">
            /* <![CDATA[ */
            var google_conversion_id = 849670675;
            var google_conversion_language = "en";
            var google_conversion_format = "3";
            var google_conversion_color = "ffffff";
            var google_conversion_label = "aB_vCPyJgHIQk-STlQM";
            var google_remarketing_only = false;
            /* ]]> */
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
            </script>
            <noscript>
            <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/849670675/?label=aB_vCPyJgHIQk-STlQM&amp;guid=ON&amp;script=0"/>
            </div>
            </noscript>
          @endif

        <div class="container-fluid hero-wrapper" style="background-image:url('/images/{{ $artist->image_background }}');">
            <div class="container header-wrapper">

                <div class="text-center main-logo">
                    <img src="/images/{{ $artist->logo }}">
                </div> <!-- main-logo -->

                <div class="text-center main-copy">
                    <h1>Thanks for following me!</h1>
                    <h3>You're now the first to hear my brand new music</h3>
                    <a target="_blank" href="https://open.spotify.com/user/{{ $playlist->user_id }}/playlist/{{ $playlist->playlist_id }}" class="btn btn-lg btn-success">Listen now</a>
                </div>

                <div class="row">
                    <div class="col-md-offset-3 col-sm-offset-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="artwork">
                            <img class="img-responsive" src="/TruthOrDare-Spotify-1400x1400.jpg">
                            <p class="text-center" style="color: grey; padding-top: 10px;">Release: June 23rd</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="artwork">
                            <img class="img-responsive" src="https://u.scdn.co/images/pl/default/9121211b266211ea356e123e4c78b71d374ddbda">
                            <p class="text-center" style="color: grey; padding-top: 10px;">R3HAB | Night Playlist</p>
                        </div>
                    </div>
                </div>

            </div>  <!-- hero-wrapper -->
        </div> <!-- hero-wrapper -->

        <div class="container-fluid footer-wrapper">
            <div class="container footer-content">
                <div class="text-center latest-releases-copy">

                    <img src="/images/{{ $artist->avatar }}">

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

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-101078711-1', 'auto');
          ga('send', 'pageview');

        </script>

    </body>
</html>

<!-- rows tussen cols en containers -->
