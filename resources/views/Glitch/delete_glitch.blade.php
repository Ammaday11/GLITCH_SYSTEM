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
                                    <h3 class="mb-2">Glitch Details</h3>
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
                                <h5 class="card-header">{{ $glitch->title }}</h5>
                                <div class="card-body">
                                    <form action="{{route('glitches.destroy', ['id' => $glitch->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                            <label for="room_no">Room No</label>
                                            <input type="text" name="room_no" id="room_no" class="form-control" value="{{ $glitch->room_no }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="guest_name">Guest Name</label>
                                            <input type="text" name="guest_name" id="guest_name" class="form-control" value="{{ $glitch->guest_name }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" name="category" id="category" class="form-control" value="{{ $glitch->category }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" value="{{ $glitch->title }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" required readonly>{{ $glitch->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <input type="text" name="status" id="status" class="form-control" value="{{ $glitch->status }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="user_id">Received By</label>
                                            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $glitch->user->name }} @ {{ $glitch->created_at->format('H:i') }}" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="updated_by">Updated By</label>
                                            <input type="text" name="updated_by" id="updated_by" class="form-control" value="{{ $glitch->updatedBy->name }} @ {{ $glitch->updated_at->format('H:i') }}" required readonly>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                                
                                            </div>
                                            <div class="col-sm-6 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" class="btn btn-space btn-danger">Delete</button>
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


