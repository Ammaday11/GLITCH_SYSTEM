<link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css')}}">
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$user->name}} - Edit</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}"  data-parsley-validate="" method='POST' enctype="multipart/form-data">
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
                        <input class="form-control form-control-lg" id="bwlmNo" name="bwlmNo" type="text" required="" placeholder="bwlmNo">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="name" name="name" type="text" required="" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" required="" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label  for="roles">Select Roles</label>
                        <select id='pre-selected-options' name="roles[]" multiple='multiple' required>
                            <option value='3'>Staff</option>
                            <option value='2'>Manager</option>
                            <option value='1'>Administrator</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>

<script src="../resources/assets/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
     <script src="../resources/assets/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
     <script src="../resources/assets/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
     <script src="../resources/assets/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
     <script src="../resources/assets/assets/libs/js/main-js.js"></script>
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