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