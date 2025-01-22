@extends('layouts.dashboard')

@section('style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


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
                                    <h3 class="mb-2">Reports</h3>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Reports</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Glitch by Guest Name</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ============================================================== -->
                        <!-- data table  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                    <button id="exportBtn" class="btn btn-info">Excel</button>
                                    <button id="exportToPDF" class="btn ml-2 btn-info">PDF</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" data-order='' class="table table-striped table-bordered second" style="width:100%">
                                            <thead>
                                                    <tr>
                                                        <th>Room No</th>
                                                        <th>Guest Name</th>
                                                        <th>Arrival Date</th>
                                                        <th>Departure Date</th>
                                                        <th>Glitch Title</th>
                                                        <th>Count</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sortedData as $guestName => $data)
                                                        <tr>
                                                            <td rowspan="{{ $data['glitches']->count() }}">{{ $data['glitches']->first()->room_No }}</td>
                                                            <td rowspan="{{ $data['glitches']->count() }}">{{ $guestName }}</td>
                                                            <td rowspan="{{ $data['glitches']->count() }}">{{ $data['glitches']->first()->arrival_date }}</td>
                                                            <td rowspan="{{ $data['glitches']->count() }}">{{ $data['glitches']->first()->departure_date }}</td>
                                                            <td>
                                                                {{ $data['glitches']->first()->glitch_title }}
                                                            </td>
                                                            <td rowspan="{{ $data['glitches']->count() }}">{{ $data['count'] }}</td>
                                                        </tr>
                                                        @foreach($data['glitches']->skip(1) as $glitch)
                                                            <tr>
                                                                <td>{{ $glitch->glitch_title }}</td>
                                                            </tr>
                                                        @endforeach
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
    <script>
        document.getElementById('exportBtn').addEventListener('click', function () {
            var wb = XLSX.utils.table_to_book(document.getElementById('example'), { sheet: "Sheet 1" });
            XLSX.writeFile(wb, "glitch_by_guest_name.xlsx");
        });

        document.getElementById('exportToPDF').addEventListener('click', function () {
                var element = document.getElementById('example');
                html2pdf(element, {
                    filename: 'glitch_by_guest_name.pdf',
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                });
            });
    </script>

    @endsection

</body>
@endsection