<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <!--load progress bar-->
    <script src="{{ asset('vendor/pace/pace.min.js') }}"></script>
    <link href="{{ asset('vendor/pace/pace-theme-minimal.css') }}" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('stylesheets/css/style.css') }}">
    <meta name="_token" content="{{ csrf_token() }}">
    @yield('additional_headers')

</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <!-- Navbar start -->
        @include('layouts.navbar')
        <!-- Navbar End -->
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR Start -->
            <!-- ========================================================= -->
            @include('layouts.sidebar')
            <!-- LEFT SIDEBAR End -->
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <!-- Main start -->
              @yield('content')
            <!-- Main End -->


            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('vendor/jquery/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/nano-scroller/nano-scroller.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('javascripts/template-script.min.js') }}"></script>
    <script src="{{ asset('javascripts/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <!--morris chart-->
    <script src="{{ asset('vendor/chart-js/chart.min.js') }}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!--Examples-->
    <!-- <script src="{{ asset('javascripts/examples/dashboard.js') }}"></script -->
    {!! Toastr::message() !!}
    @yield('additional_scripts')
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:07 GMT -->
</html>
