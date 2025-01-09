@extends('layouts.dashboard')

@section('style')
<!-- <link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/buttons.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/select.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
<link rel="stylesheet" href="../resources/assets/assets/vendor/datepicker/tempusdominus-bootstrap-4.css"> -->

<!-- <link rel="stylesheet" href="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.css')}}"> -->
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
                                    <h3 class="mb-2">Create New Glitch</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Glitches</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Create new glitch</li>
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
                                <h5 class="card-header">Create new glitch</h5>
                                <div class="card-body">
                                    <form action="{{ route('glitches.store') }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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

                                        @csrf
                                        <div class="form-group">
                                            <label  for="room_no">Room Number</label>
                                            <input type="text" name="room_no"  placeholder="Room No" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="guest_name">Guest Name</label>
                                            <input type="text" name="guest_name" id="guest_name" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <option value="general request">General Request</option>
                                                <option value="complaint">Complaint</option>
                                                <option value="issue">Issue</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
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
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
         -->

        <!-- <script src="{{asset('assets/vendor/datepicker/moment.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/tempusdominus-bootstrap-4.js')}}"></script>
        <script src="{{asset('assets/vendor/datepicker/datepicker.js')}}"></script> -->
        <!-- <script src="../resources/assets/assets/vendor/datepicker/moment.js"></script>
        <script src="../resources/assets/assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="../resources/assets/assets/vendor/datepicker/datepicker.js"></script> -->
    @endsection

</body>
@endsection


