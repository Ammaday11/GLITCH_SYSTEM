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
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('glitches.get_report')}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fab fa-fw fa-wpforms"></i>Reports</a>
                    </li>
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