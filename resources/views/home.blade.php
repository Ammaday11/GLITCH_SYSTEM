@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
<style>
    .custom-select {
        -webkit-appearance: none; /* Remove default arrow in Chrome/Safari */
        -moz-appearance: none; /* Remove default arrow in Firefox */
        appearance: none; /* Remove default arrow in modern browsers */
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"%3E%3Cpath fill="%23000000" d="M2 0L0 2h4zm0 5L0 3h4z"/%3E%3C/svg%3E');
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 0.65em auto;
        padding-right: 2.5rem; /* Add space for the dropdown icon */
    }
</style>
@endsection

@section('content')
<body> 
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <!-- ============================================================== -->
                        <!-- Start Content  -->
                        <!-- ============================================================== -->

                        <!-- <h1 class="text-center">{{ now()->format('d - M - Y') }}</h1> -->
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total followers   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Pending</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                    @if($glitch->status == 'Pending')
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$count}}
                                            </h2>                                            
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
                                            <i class=" fas fa-clock fa-fw fa-sm text-brand"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total followers   -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- partnerships   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Ongoing</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                    @if($glitch->status == 'Ongoing')
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$count}}
                                            </h2>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                            <i class=" fa fa-exclamation-triangle fa-fw fa-sm text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Follow-up Pending</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                    @if($glitch->status == 'Follow-up Pending')
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$count}}
                                            </h2>
                                        </div>
                                        <!-- <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
                                            <i class="fas fa-calendar-check fa-fw fa-sm text-warning"></i>
                                        </div> -->
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                            <i class=" fa fa-calendar-check fa-fw fa-sm text-dark"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Suspended</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                    @if($glitch->status == 'Suspended')
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$count}}
                                            </h2>
                                        </div>
                                        <!-- <div class="float-right icon-circle-medium  icon-box-lg  bg-warning-light mt-1">
                                            <i class="fas fa-calendar-check fa-fw fa-sm text-warning"></i>
                                        </div> -->
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-danger-light mt-1">
                                            <i class="far fa-pause-circle fa-fw fa-sm text-danger"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end partnerships   -->
                            <!-- ============================================================== -->
                            
                            <!-- ============================================================== -->
                            <!-- total earned   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Resolved</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                    @if($glitch->status == 'Resolved')
                                                        @php
                                                            $count++;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                {{$count}}
                                            </h2>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                            <i class="fas fa-check fa-fw fa-sm text-success"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total earned   -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total views   -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-inline-block">
                                            <h5 class="text-muted">Total</h5>
                                            <h2 class="mb-0">
                                                @php
                                                    $count = 0; // Initialize the count variable
                                                @endphp
                                                @foreach ($glitches as $glitch)
                                                        @php
                                                            $count++;
                                                        @endphp
                                                @endforeach
                                                {{$count}}
                                            </h2>
                                        </div>
                                        <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                            <i class="fa fa-eye fa-fw fa-sm text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total views   -->
                            <!-- ============================================================== -->
                        </div>
                        @include('include.messages')
                        <!-- ============================================================== -->
                        <!-- data table  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{route('glitches.create')}}" class="btn btn-info">New Glitch</a>
                                        
                                        <a href="{{route('guest.upload')}}" class="btn ml-3 btn-info">Update Guest List</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Room No</th>
                                                        <th>Guest Name</th>
                                                        <th>Category</th>
                                                        <th>Title</th>
                                                        <!-- <th>Status</th> -->
                                                        <th>Received By</th>
                                                        <th>Received At</th>
                                                        <th>Update Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($glitches->filter(fn($glitch) => $glitch->status !== 'Resolved') as $glitch)
                                                        <tr>
                                                            <td>{{ $glitch->id }}</td>
                                                            <td>{{ $glitch->room_no }}</td>
                                                            <td>{{ $glitch->guest_name }}</td>
                                                            <td>{{ $glitch->category }}</td>
                                                            <td>{{ $glitch->title }}</td>
                                                            <!-- <td>{{ $glitch->status }}</td> -->
                                                            <td>{{ $glitch->user->name }}</td>
                                                            <td>{{ $glitch->created_at->format('H:i') }}</td>
                                                            <td>
                                                            <form action="{{ route('glitches.update_status', ['id' => $glitch->id]) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <select name="status" class="form-control custom-select" onchange="this.form.submit()">
                                                                <!-- <select name="status" class="form-control custom-select" onchange="updateStatus(this)"> -->
                                                                    <option value="Pending" {{ $glitch->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                                    <option value="Ongoing" {{ $glitch->status === 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                                                    <option value="Follow-up Pending" {{ $glitch->status === 'Follow-up Pending' ? 'selected' : '' }}>Follow-up Pending</option>
                                                                    <option value="Resolved" {{ $glitch->status === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                                                    <option value="Suspended" {{ $glitch->status === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                                                </select>
                                                            </form>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('glitches.show', ['id' => $glitch->id])}}" class="btn btn-info btn-sm m-r-10 fas fa-eye"></a>
                                                                <a href="{{route('glitches.edit', ['id' => $glitch->id])}}" class="btn btn-brand btn-sm m-r-10 fas fa-edit"></a>
                                                                @can('delete_glitch')
                                                                <a href="{{route('glitches.delete', ['id' => $glitch->id])}}" class="btn  btn-danger btn-sm m-r-10 fas fa-trash"></a>
                                                                @endcan('delete_glitch')
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end data table  -->
                        <!-- ============================================================== -->
                
                        
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
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/vendor/datatables/js/data-table.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>

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
