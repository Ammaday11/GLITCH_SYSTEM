@extends('layouts.dashboard')

@section('style')
@endsection

@section('content')
<body> 
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- Start Content  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Create Glitch Type</h3>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('glitch_type.index') }}" class="breadcrumb-link">Glitch Types</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- Start Content  -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- basic form -->
                    <!-- ============================================================== -->
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin: auto">
                        <div class="card">
                            <h5 class="card-header">Create New Glitch Type</h5>
                            <div class="card-body">
                                <form action="{{ route('glitch_type.store') }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
                                    @include('include.messages')

                                    @csrf
                                    <div class="form-group">
                                        <label  for="name">Type</label>
                                        <input type="text" name="type"  placeholder="Glitch Type" class="form-control" required>
                                    </div>
                                        
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-success">Submit</button>
                                            <a href="{{route('home')}}" class="btn btn-space btn-secondary">Cancel</a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic form -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- End Content  -->
                    <!-- ============================================================== -->
                </div>
            </div>
                    <!-- ============================================================== -->
                    <!-- End Content  -->
                    <!-- ============================================================== -->    
                </div>
            </div>
        </div>




        
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        @include('include.footer')
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
    @section('script')
     <script src="{{asset('assets//vendor/jquery/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('assets//vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
     <script src="{{asset('assets//vendor/slimscroll/jquery.slimscroll.js')}}"></script>
     <script src="{{asset('assets//libs/js/main-js.js')}}"></script>
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
    @endsection

</body>
@endsection


