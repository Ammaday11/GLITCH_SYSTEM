<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GLITCH - Register</title>
    <link rel="icon" type="image/x-icon" href="https://logosbynick.com/wp-content/uploads/2018/05/vector-glitch-effect-inkscape-tutorial-1024x602.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../resources/assets/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/assets/assets/vendor/fonts/circular-std/style.css">
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    
            
        
    
    <form class="splash-container" action="{{ route('user.store') }}"  method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <a href="#"><img class="logo-img" src="{{asset('images/bwlm_logo.png')}}" alt="logo"></a>
                <p class="mt-4">Please enter your user information.</p>
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
            
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="bwlmNo" required="" placeholder="bwlmNo" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="name" required="" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" required="" name="password_confirmation" data-parsley-equalto="#password"  placeholder="Confirm Password" type="password" >
                    </div>
                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                    </div>
                </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="{{ route('user.get_login') }}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>

    <script src="../resources/assets/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../resources/assets/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../resources/assets/assets/libs/js/main-js.js"></script>
</body>

 
</html>