<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GLITCH SYSTEM</title>
        <link rel="icon" type="image/x-icon" href="https://logosbynick.com/wp-content/uploads/2018/05/vector-glitch-effect-inkscape-tutorial-1024x602.jpg">
        <!-- Bootstrap CSS -->
        
        <link rel="stylesheet" href= "{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/vendor/fonts/circular-std/style.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/libs/css/style.css')}}">
        <link rel="stylesheet" href= "{{asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
        <style>
            .custom-alert {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050; /* Ensure it appears above other content */
            min-width: 20%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            }
            .custom-alert:not(:first-of-type) {
                margin-bottom: 10px;
            }
        </style>
        @yield('style')
    </head> 

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
        
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
            @include('include.header')
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
            @include('include.sidebar')
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
            @yield('content')
        </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->

        <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('assets/libs/js/main-js.js')}}"></script>
        @yield('script')
    </body>
</html>