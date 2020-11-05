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

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/date-picker.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('dashboard/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/responsive.css') }}">
    @livewireStyles
</head>

<body class="dark-only">

	<!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->

    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('dashboard.header')

        @yield('content')

    </div>
    
    @livewireScripts
    <!-- latest jquery-->
    <script src="{{ asset('dashboard/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('dashboard/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap/bootstrap.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('dashboard/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('dashboard/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('dashboard/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('dashboard/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('dashboard/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('dashboard/js/notify/index.js') }}"></script>
    <script src="{{ asset('dashboard/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src=".{{ asset('dashboard/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('dashboard/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('dashboard/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('dashboard/js/script.js') }}"></script>
    {{-- <script src="{{ asset('dashboard/js/theme-customizer/customizer.js') }}"></script> --}}
    <!-- login js-->
    <!-- Plugin used-->
</body>
</html>
