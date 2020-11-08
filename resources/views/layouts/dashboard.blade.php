<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Solomon App</title>

    <link rel="icon" href="{{asset('dashboard/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('dashboard/images/favicon.png')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    @yield('css')
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/range-slider.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('dashboard/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/responsive.css')}}">
    @yield('style')
    @livewireStyles
  </head>

  <body class="dark-only">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @livewire('dashboard.header')
        <div class="page-body-wrapper sidebar-icon">
            @include('dashboard.sidebar')
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                @yield('breadcrumb-title')
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                                    </li>
                                    @yield('breadcrumb-items')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            </div>
                {{-- @include('layouts.simple.footer')    --}}
        </div>
    </div>

    <!-- latest jquery-->
    <script src="{{asset('dashboard/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('dashboard/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('dashboard/js/bootstrap/bootstrap.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('dashboard/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('dashboard/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('dashboard/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    @yield('script')
    <script src="{{asset('dashboard/js/range-slider/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('dashboard/js/range-slider/rangeslider-script.js')}}"></script>
    <script src="{{asset('dashboard/js/touchspin/vendors.min.js')}}"></script>
    <script src="{{asset('dashboard/js/touchspin/touchspin.js')}}"></script>
    <script src="{{asset('dashboard/js/touchspin/input-groups.min.js')}}"></script>
    <script src="{{asset('dashboard/js/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('dashboard/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('dashboard/js/select2/select2-custom.js')}}"></script>
    <script src="{{asset('dashboard/js/product-tab.js')}}"></script>
    <script src="{{asset('dashboard/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('dashboard/js/tooltip-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('dashboard/js/script.js')}}"></script>
    @livewireScripts
    </body>
</html>