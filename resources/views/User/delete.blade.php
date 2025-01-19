@extends('layouts.dashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css')}}">
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
                                <h3 class="mb-2">Delete User</h3>
                                <p class="pageheader-text"></p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('user.list') }}" class="breadcrumb-link">Users</a></li>
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
                            <h5 class="card-header">{{$user->name}} - Delete</h5>
                            <div class="card-body">
                                <form action="{{route('user.destroy', ['id' => $user->id])}}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                                        <label for="bwlmNo">BWLM NO</label>
                                        <input type="text" name="bwlmNo" id="bwlmNo" class="form-control" value="{{ $user->bwlmNo }}" required readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label  for="roles">Select Roles</label>
                                        <select id='pre-selected-options' name="roles[]" multiple='multiple' required>
                                            < @foreach($roles as $id => $name)
                                                <option disabled value="{{ $id }}" {{ in_array($id, $userRoles) ? 'selected' : '' }}>
                                                    {{ $name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                            
                                        </div>
                                        <div class="col-sm-6 pl-0">
                                            <p class="text-right">
                                                <button type="submit" class="btn btn-space btn-danger">Delete</button>
                                                <a href="{{ route('user.list') }}" class="btn btn-space btn-secondary">Cancel</a>
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
     <script src="{{asset('assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
     <script src="{{asset('assets/libs/js/main-js.js')}}"></script>
    <script>
    $('#my-select, #pre-selected-options').multiSelect()
    </script>
    <script>
    $('#callbacks').multiSelect({
        afterSelect: function(values) {
            alert("Select value: " + values);
        },
        afterDeselect: function(values) {
            alert("Deselect value: " + values);
        }
    });
    </script>
    <script>
    $('#keep-order').multiSelect({ keepOrder: true });
    </script>
    <script>
    $('#public-methods').multiSelect();
    $('#select-all').click(function() {
        $('#public-methods').multiSelect('select_all');
        return false;
    });
    $('#deselect-all').click(function() {
        $('#public-methods').multiSelect('deselect_all');
        return false;
    });
    $('#select-100').click(function() {
        $('#public-methods').multiSelect('select', ['elem_0', 'elem_1'..., 'elem_99']);
        return false;
    });
    $('#deselect-100').click(function() {
        $('#public-methods').multiSelect('deselect', ['elem_0', 'elem_1'..., 'elem_99']);
        return false;
    });
    $('#refresh').on('click', function() {
        $('#public-methods').multiSelect('refresh');
        return false;
    });
    $('#add-option').on('click', function() {
        $('#public-methods').multiSelect('addOption', { value: 42, text: 'test 42', index: 0 });
        return false;
    });
    </script>
    <script>
    $('#optgroup').multiSelect({ selectableOptgroup: true });
    </script>
    <script>
    $('#disabled-attribute').multiSelect();
    </script>
    <script>
    $('#custom-headers').multiSelect({
        selectableHeader: "<div class='custom-header'>Selectable items</div>",
        selectionHeader: "<div class='custom-header'>Selection items</div>",
        selectableFooter: "<div class='custom-header'>Selectable footer</div>",
        selectionFooter: "<div class='custom-header'>Selection footer</div>"
    });
    </script>
    @endsection

</body>
@endsection


