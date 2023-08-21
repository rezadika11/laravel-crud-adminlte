<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="pages/widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('prodi.index') }}" class="nav-link {{ Request::is('prodi*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Prodi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('mahasiswa.index') }}"
                    class="nav-link {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Mahasiswa
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Layout Options
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">6</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Top Navigation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Top Navigation + Sidebar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/boxed.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Boxed</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Sidebar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Sidebar <small>+ Custom Area</small></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/fixed-topnav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Navbar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/fixed-footer.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Fixed Footer</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Collapsed Sidebar</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">Settings</li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-danger text-white"><i
                            class="fas fa-sign-out-alt"></i>
                        Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
