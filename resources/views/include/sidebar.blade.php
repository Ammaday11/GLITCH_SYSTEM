<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="{{route('home')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-fw  fa-dashcube"></i>Dashboard<span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('glitches.all_glitches')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw  fa-braille"></i>Glitches</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{route('glitches.get_report')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-fw fa-wpforms"></i>Reports</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.html" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fab fa-fw fa-wpforms"></i>Reports</a>
                        <div id="submenu-1-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('glitches.get_report')}}">General Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('glitches.generateDayEndReport')}}">Glitch by Guest Name</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @can('manage_staff')    
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('staff.index')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-street-view"></i>Staff<span class="badge badge-success">6</span></a>
                    </li>
                    @endcan('manage_users')
                    @can('manage_glitch_types')    
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('glitch_type.index')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-boxes"></i>Glitch Types<span class="badge badge-success">6</span></a>
                    </li>
                    @endcan('manage_glitch_types')
                    
                    @can('manage_guest_satisfactions')    
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('guest_satisfaction.index')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-thumbs-up"></i>Guest Satisfaction<span class="badge badge-success">6</span></a>
                    </li>
                    @endcan('manage_guest_satisfactions')
                    @can('manage_users')    
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('user.list')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>User Management<span class="badge badge-success">6</span></a>
                    </li>
                    @endcan('manage_users')
                </ul>
            </div>
        </nav>
    </div>
</div>