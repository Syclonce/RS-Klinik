 <!-- Sidebar -->
 <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="pb-3 mt-3 mb-3 user-panel d-flex">
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
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE;"></i>
                  <p>
                    Dokter
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor') }}" class="nav-link {{ \Route::is('doctor') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah dokter</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
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

            <li class="nav-item {{ \Route::is('patient*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('patient*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-hospital-user" style="color: #63E6BE;"></i>
                  <p>
                    Pasien
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('patient') }}" class="nav-link {{ \Route::is('patient') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Pasien</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.seks') }}" class="nav-link {{ \Route::is('patient.seks') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah seks</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.goldar') }}" class="nav-link {{ \Route::is('patient.goldar') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah goldar</p>
                    </a>
                  </li>
                </ul>
            </li>

            {{-- <li class="nav-item {{ \Route::is('schedule*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('schedule*') ? 'active' : '' }}">
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE;"></i>
                  <p>
                    Susunan Acara
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('schedule') }}" class="nav-link {{ \Route::is('schedule') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Semua Susunan Acara</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('schedule.liburan') }}" class="nav-link {{ \Route::is('schedule.liburan') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Liburan</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('janji*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('janji*') ? 'active' : '' }}">
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE;"></i>
                  <p>
                    Janji
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('janji') }}" class="nav-link {{ \Route::is('janji') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Konfirmasi Tertunda</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('janji') }}" class="nav-link {{ \Route::is('janji') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Dikonfirmasi</p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('janji') }}" class="nav-link {{ \Route::is('janji') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Diobati</p>
                    </a>
                  </li>
                </ul>
            </li> --}}


            <li class="nav-item {{ \Route::is('sdm*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('sdm*') ? 'active' : '' }}">
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE;"></i>
                  <p>
                    Sumberdaya Manusia
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('sdm') }}" class="nav-link {{ \Route::is('sdm') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Perawat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sdm.apoteker') }}" class="nav-link {{ \Route::is('sdm.apoteker') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Apoteker</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sdm.laboratorium') }}" class="nav-link {{ \Route::is('sdm.laboratorium') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Laboratorium</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sdm.akuntan') }}" class="nav-link {{ \Route::is('sdm.akuntan') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Akuntan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('sdm.resepsionis') }}" class="nav-link {{ \Route::is('sdm.resepsionis') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Resepsionis</p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item {{ \Route::is('finance*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('finance*') ? 'active' : '' }}">
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE;"></i>
                  <p>
                    Aktivitas Keuangan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('finance') }}" class="nav-link {{ \Route::is('finance') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Pembayaran</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('finance.daig') }}" class="nav-link {{ \Route::is('finance.daig') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Tipe Pemeriksaan</p>
                    </a>
                  </li>
                </ul>
            </li>
                  <li class="nav-item">
                    <a href="{{ route('finance.daig') }}" class="nav-link {{ \Route::is('finance.daig') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Prosedur Pembayaran</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('setweb') }}"
                    class="nav-link {{ \Route::is('setweb') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-cogs"></i>
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
