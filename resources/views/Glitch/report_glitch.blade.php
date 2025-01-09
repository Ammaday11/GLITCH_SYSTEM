@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
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

                        <h2 class="text-center">Glitch - Reports</h2>
                        

                        <!-- ============================================================== -->
                        <!-- data table  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <form method="GET" action="{{route('glitches.report')}}">
                                        <label for="start_date">Start Date:</label>
                                        <input class="form-control" style="width:10%;display: inline-block;" type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" required>

                                        <label class="ml-4" for="end_date">End Date:</label>
                                        <input class="form-control" style="width:10%;display: inline-block;" type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" required>

                                        <label class="ml-4" for="category">Category:</label>
                                            <select style="width:10%;display: inline-block;" name="category" id="category" class="form-control">
                                                <option value="">All</option>
                                                <option value="general request" {{ request('category') == 'general request' ? 'selected' : '' }}>General Request</option>
                                                <option value="complaint" {{ request('category') == 'complaint' ? 'selected' : '' }}>Complaint</option>
                                                <option value="issue" {{ request('category') == 'issue' ? 'selected' : '' }}>Issue</option>
                                            </select>
                                        

                                        <label class="ml-4" for="status">Status:</label>
                                        <select style="width:10%;display: inline-block;" name="status" id="status" class="form-control">
                                                <option value="">All</option>
                                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                <option value="follow-up pending" {{ request('status') == 'follow-up pending' ? 'selected' : '' }}>Follow-up Pending</option>
                                                <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                                <option value="deleted" {{ request('status') == 'deleted' ? 'selected' : '' }}>Deleted</option>
                                            </select>

                                        <button class="btn btn-space btn-info ml-4" type="submit">Generate Report</button>
                                    </form>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Room No</th>
                                                        <th>Guest Name</th>
                                                        <th>Category</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Received By</th>
                                                        <th>Received At</th>
                                                        <th>Updated By</th>
                                                        <th>Updated At</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($glitches as $glitch)
                                                    <tr>
                                                        <td>{{ $glitch->room_no }}</td>
                                                        <td>{{ $glitch->guest_name }}</td>
                                                        <td>{{ $glitch->category }}</td>
                                                        <td>{{ $glitch->title }}</td>
                                                        <td>{{ $glitch->description }}</td>
                                                        <td>{{ $glitch->status }}</td>
                                                        <td>{{ $glitch->user->name }}</td>
                                                        <td>{{ $glitch->created_at->format('d-m-Y @ H:i') }}</td>
                                                        <td>{{ $glitch->updatedBy->name }}</td>
                                                        <td>{{ $glitch->updated_at->format('d-m-Y @ H:i') }}</td>
                                                    </tr>
                                                @empty
                                                    <!-- <tr>
                                                        <td colspan="6">No data found for the selected criteria.</td>
                                                    </tr> -->
                                                @endforelse
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
        <script src="../resources/assets/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="../resources/assets/assets/vendor/datatables/js/data-table.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    @endsection

</body>
@endsection

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
