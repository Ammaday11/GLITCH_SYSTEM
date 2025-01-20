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
                                    <h3 class="mb-2">Edit Glitch</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Glitches</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">{{ $glitch->id }}</li>
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
                                <h5 class="card-header">{{ $glitch->title }} - Edit</h5>
                                <div class="card-body">
                                    <form action="{{route('glitches.update', ['id' => $glitch->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
                                        @include('include.messages')
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="room_no">Room No</label>
                                            <input type="text" name="room_no" id="room_no" class="form-control" value="{{ $glitch->room_no }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="guest_name">Guest Name</label>
                                            <input type="text" name="guest_name" id="guest_name" class="form-control" value="{{ $glitch->guest_name }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="general request" {{ $glitch->category == 'general request' ? 'selected' : '' }}>General Request</option>
                                                <option value="complaint" {{ $glitch->category == 'complaint' ? 'selected' : '' }}>Complaint</option>
                                                <option value="issue" {{ $glitch->category == 'issue' ? 'selected' : '' }}>Issue</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" value="{{ $glitch->title }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $glitch->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="pending" {{ $glitch->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="ongoing" {{ $glitch->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                                <option value="resolved" {{ $glitch->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                                <option value="follow-up pending" {{ $glitch->status == 'Follow-up Pending' ? 'selected' : '' }}>Follow-Up Pending</option>
                                                <option value="suspended" {{ $glitch->status == 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                            </select>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-success">Update</button>
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
    @endsection

</body>
@endsection


