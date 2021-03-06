<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Solomon App</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-shop.css') }}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/rs-plugin/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/circle-flip-slideshow/css/component.css') }}">
    
    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('css/skins/skin-corporate-4.css') }}"> 

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>
    @livewireStyles
</head>

<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="body">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v9.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="103519311594709" theme_color="#FEE21E"></div>

    </div>
    
    @livewireScripts
    <!-- Vendor -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
    <script src="{{ asset('vendor/popper/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/common/common.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
    <script src=""></script>
    <script src="{{ asset('vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
    <script src=""></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/vide/jquery.vide.min.js') }}"></script>
    <script src="{{ asset('vendor/vivus/vivus.min.js') }}"></script>

    <!--(remove-empty-lines-end)-->

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('js/theme.js') }}"></script>

    <!-- Current Page Vendor and Views -->
    <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') }}"></script>
    <script src="{{ asset('js/views/view.home.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('js/theme.init.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHYtLgQ_Ba64sIJlYajgT8fREDbNfb6fA"></script>
    <script>

        /*
        Map Settings

            Find the Latitude and Longitude of your address:
                - https://www.latlong.net/
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

        */

        // Map Markers
        var mapMarkers = [{
            address: "Cebu, PH 6000",
            html: "<strong>Solomon Office</strong><br>Cebu, PH 6000",
            icon: {
                image: "images/pin.png",
                iconsize: [26, 46],
                iconanchor: [12, 46]
            },
            popup: true
        }];

        // Map Initial Location
        var initLatitude = 10.316235;
        var initLongitude = 123.9146156;

        // Map Extended Settings
        var mapSettings = {
            controls: {
                draggable: (($.browser.mobile) ? false : true),
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true
            },
            scrollwheel: false,
            markers: mapMarkers,
            latitude: initLatitude,
            longitude: initLongitude,
            zoom: 11
        };

        var map = $('#googlemaps').gMap(mapSettings);

        // Map text-center At
        var mapCenterAt = function(options, e) {
            e.preventDefault();
            $('#googlemaps').gMap("centerAt", options);
        }

    </script>

</body>
</html>
