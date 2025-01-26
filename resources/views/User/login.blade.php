<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GLITCH - Login System - Login</title>
    <link rel="icon" type="image/x-icon" href="https://logosbynick.com/wp-content/uploads/2018/05/vector-glitch-effect-inkscape-tutorial-1024x602.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-image: url('{{asset('images/hotel.jpg')}}'); /* Replace with your image URL */
        background-size: cover; /* Ensures the image covers the entire viewport */
        background-position: center; /* Centers the image */
        background-repeat: no-repeat; /* Prevents tiling */
        background-attachment: fixed; /* Ensures the image stays fixed while scrolling */
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="#"><img class="logo-img" src="{{asset('images/bwlm_logo.png')}}" alt="logo"></a>
                <span class="splash-description mt-4">Please enter your login information.</span>
                @include('include.messages')
            </div>
            <div class="card-body">
                
                <form action="{{ route('user.login') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="bwlmNo" id="bwlmNo" type="text" placeholder="BWLM Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
            
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener("DOMContentLoaded", function () {
            // Select all alerts
            const alerts = document.querySelectorAll('.alert');

            // Set a timeout to fade out and remove the alert after 5 seconds
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show'); // Remove the 'show' class
                    alert.classList.add('fade');   // Optionally add 'fade' for smooth transition
                    setTimeout(() => alert.remove(), 300); // Remove alert after transition (0.3s)
                }, 3000); // 3 seconds
            });
        });

    </script>
</body>
</html>