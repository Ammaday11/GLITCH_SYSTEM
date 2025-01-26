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
                                <h3 class="mb-2">Delete Guest Satisfaction</h3>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('guest_satisfaction.index') }}" class="breadcrumb-link">Guest Satisfactions</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Delete</li>
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
                            <h5 class="card-header">{{$satisfaction->guest_satisfaction}} - Delete</h5>
                            <div class="card-body">
                                <form action="{{route('guest_satisfaction.destroy', ['id' => $satisfaction->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
                                    @include('include.messages')

                                    @csrf

                                    <div class="form-group">
                                        <label for="guest_satisfaction">Guest Satisfaction</label>
                                        <input type="text" name="guest_satisfaction" id="guest_satisfaction" class="form-control" value="{{ $satisfaction->guest_satisfaction }}" required readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                                <button type="submit" class="btn btn-space btn-danger">Delete</button>
                                                <a href="{{ route('guest_satisfaction.index') }}" class="btn btn-space btn-secondary">Cancel</a>
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
     <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
     <script src="{{asset('assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
     <script src="{{asset('assets/libs/js/main-js.js')}}"></script>
    <script>
    <script>
   
    @endsection

</body>
@endsection


