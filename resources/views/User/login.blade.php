<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GLITCH - Login System - Login</title>
    <link rel="icon" type="image/x-icon" href="https://logosbynick.com/wp-content/uploads/2018/05/vector-glitch-effect-inkscape-tutorial-1024x602.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../resources/assets/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../resources/assets/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/assets/assets/libs/css/style.css">
    <link rel="stylesheet" href="../resources/assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                <span class="splash-description mt-4">Please enter your user information.</span>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{$error}}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a> 
                        </div>
                    @endforeach
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a> 
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a> 
                    </div>
                @endif
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
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('user.create') }}" class="footer-link">Create An Account</a></div>
                {{-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div> --}}
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../resources/assets/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../resources/assets/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>