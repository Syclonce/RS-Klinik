 <!-- Sidebar -->
 <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('storage/' . Auth::user()->profile) }}" class="img-circle elevation-2"
                alt="Profile Photo">
        </div>
        <div class="info">
            @if (Auth::check())
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            @endif
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                aria-label="Search">
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
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('superadmin') }}"
                    class="nav-link {{ \Route::is('superadmin') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-hospital" style="color: #74C0FC;"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw  fa-solid fa-user-doctor" style="color: #63E6BE;"></i>
                  <p>
                    Dokter
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor') }}" class="nav-link {{ \Route::is('doctor') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>tambah dokter</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw  fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p>Tambah Spesiali</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p>Kunjungan Dokter</p>
                    </a>
                  </li>
                </ul>
              </li>



            <li class="nav-item">
                <a href="{{ route('setweb') }}"
                    class="nav-link {{ \Route::is('setweb') ? 'active' : '' }}">
                    <i class="fas fa-fw  fa-cogs"></i>
                    <p>
                        Web Seting
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <form action="{{ route('update.app') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Update Application</button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
