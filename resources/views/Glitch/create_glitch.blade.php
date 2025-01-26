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
                                            @include('include.messages')

                                            @csrf
                                            <div class="form-group">
                                                <label  for="room_no">Room Number</label>
                                                <input type="text" name="room_no"  placeholder="Room No" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select name="category" id="category" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    <option value="General request">General Request</option>
                                                    <option value="Complaint">Complaint</option>
                                                    <option value="Issue">Issue</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="category">Glitch Type</label>
                                                <div class="d-flex align-items-center">
                                                    <select name="glitch_type" id="glitch_type" class="form-control" required>
                                                        <option value="">Select</option>
                                                        @foreach($glitch_types as $glitch_type)
                                                            <option value="{{ $glitch_type }}" >{{ $glitch_type }}</option>
                                                        @endforeach
                                                    </select>
                                                    <a href="{{route('glitch_type.create')}}" class="btn btn-info ml-2">New</a>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" id="title" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
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


