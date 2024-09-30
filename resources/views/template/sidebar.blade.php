
<!-- Sidebar -->
 <div class="sidebar">
    <br>
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
        <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('superadmin') }}"
                    class="nav-link {{ \Route::is('superadmin') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-hospital" style="color: #74C0FC; font-size: 1.2rem;"></i>
                    <p style="margin-left: 10px;">Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Dokter
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- <li class="nav-item">
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
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p>Kunjungan Dokter</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.poli') }}" class="nav-link {{ \Route::is('doctor.poli') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p>Poli</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.jabatan') }}" class="nav-link {{ \Route::is('doctor.jabatan') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p>Tambah Jabatan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.status') }}" class="nav-link {{ \Route::is('doctor.status') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p>Tambah Status Dokter</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('patient*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('patient*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-hospital-user" style="color: #63E6BE; font-size: 1.2rem;"></i>
                    <p style="margin-left: 10px;">
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
                      <p>Tambah Seks</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.goldar') }}" class="nav-link {{ \Route::is('patient.goldar') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Goldar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.suku') }}" class="nav-link {{ \Route::is('patient.suku') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Suku</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.bangsa') }}" class="nav-link {{ \Route::is('patient.bangsa') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Bangsa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.bahasa') }}" class="nav-link {{ \Route::is('patient.bahasa') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Bahasa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('patient.penjamin') }}" class="nav-link {{ \Route::is('patient.penjamin') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-user-plus" style="color: #63E6BE;"></i>
                      <p>Tambah Penjamin</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('regis*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('regis*') ? 'active' : '' }}">
                    <i class="fa-solid fa-clock" style="color: #63E6BE; font-size: 1.2rem;"></i>
                    <p style="margin-left: 10px;">
                        Registrasi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('regis') }}" class="nav-link {{ \Route::is('regis') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>UGD</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regis.rajal') }}" class="nav-link {{ \Route::is('regis.rajal') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Rawat Jalan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regis.ranap') }}" class="nav-link {{ \Route::is('regis.ranap') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Rawat Inap</p>
                    </a>
                  </li>
                </ul>
            </li>


            <li class="nav-item {{ \Route::is('schedule*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('schedule*') ? 'active' : '' }}">
                <i class="fa-solid fa-clock" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
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
                  <i class="fa-solid fa-calendar-check" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
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
            </li>

            <li class="nav-item {{ \Route::is('sdm*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('sdm*') ? 'active' : '' }}">
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Sumber Daya Manusia
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('sdm.doktor') }}" class="nav-link {{ \Route::is('sdm.doktor') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Dokter</p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doctor') }}" class="nav-link {{ \Route::is('doctor') ? 'active' : '' }}">
                              <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                              <p>Tambah Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                              <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                              <p>Tambah Spesiali</p>
                            </a>
                        </li>
                    </ul>
                  </li>
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
                  <i class="fas fa-fw fa-solid fa-clock" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
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
                  <li class="nav-item">
                    <a href="{{ route('finance.prosedur') }}" class="nav-link {{ \Route::is('finance.prosedur') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Prosedur Pembayaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('finance.kategori') }}" class="nav-link {{ \Route::is('finance.kategori') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Kategori Pembayaran</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('finance.biaya') }}" class="nav-link {{ \Route::is('finance.biaya') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Biaya</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('laporan*') ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ \Route::is('laporan*') ? 'active' : '' }}">
              <i class="fa-solid fa-flask" style="color: #63E6BE; font-size: 1.2rem;"></i>
                <p style="margin-left: 10px;">
                  Tes Lab
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{ route('laporan') }}" class="nav-link {{ \Route::is('laporan') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Laporan Lab</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('laporan.template') }}" class="nav-link {{ \Route::is('laporan.template') ? 'active' : '' }}">
                      <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                      <p>Template</p>
                    </a>
                  </li>
              </ul>
            </li>

            <li class="nav-item {{ \Route::is('obat*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('obat*') ? 'active' : '' }}">
                <i class="fa-solid fa-suitcase-medical" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Obat
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('obat') }}" class="nav-link {{ \Route::is('obat') ? 'active' : '' }}">
                          <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                          <p>Daftar Obat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('obat.kategori') }}" class="nav-link {{ \Route::is('obat.kategori') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Kategori Obat</p>
                      </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('farmasi*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('farmasi*') ? 'active' : '' }}">
                <i class="fa-solid fa-capsules" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Farmasi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('farmasi') }}" class="nav-link {{ \Route::is('farmasi') ? 'active' : '' }}">
                          <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                          <p>Penjualan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('farmasi.kategori') }}" class="nav-link {{ \Route::is('farmasi.kategori') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Kategori Biaya</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('farmasi.biaya') }}" class="nav-link {{ \Route::is('farmasi.biaya') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Biaya</p>
                      </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('kamar*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('kamar*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Kamar & Bed
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('kamar') }}" class="nav-link {{ \Route::is('kamar') ? 'active' : '' }}">
                            <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                          <p>Tambah kamar & Bed</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('kamar.kelas') }}" class="nav-link {{ \Route::is('kamar.kelas') ? 'active' : '' }}">
                            <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                          <p>Kelas kamar & Bed</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ \Route::is('antrian*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('antrian*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Antrian
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('antrian') }}" class="nav-link {{ \Route::is('antrian') ? 'active' : '' }}">
                            <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                          <p>Tambah Antrian</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('index*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('index*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('datmas.bangsal') }}" class="nav-link {{ \Route::is('datmas.bangsal') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Bangsal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.dabar') }}" class="nav-link {{ \Route::is('datmas.dabar') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perjal') }}" class="nav-link {{ \Route::is('datmas.perjal') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Perawatan Rawat Jalan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.pernap') }}" class="nav-link {{ \Route::is('datmas.pernap') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Perawatan Rawat Inap</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perlogi') }}" class="nav-link {{ \Route::is('datmas.perlogi') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Perawatan Radiologi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katbar') }}" class="nav-link {{ \Route::is('datmas.katbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Kategori Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katpen') }}" class="nav-link {{ \Route::is('datmas.katpen') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Kategori Penyakit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katper') }}" class="nav-link {{ \Route::is('datmas.katper') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Kategori Perawatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.satuan') }}" class="nav-link {{ \Route::is('datmas.satuan') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Kode Satuan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.jenbar') }}" class="nav-link {{ \Route::is('datmas.jenbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Jenis Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.industri') }}" class="nav-link {{ \Route::is('datmas.industri') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Industri Farmasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.golbar') }}" class="nav-link {{ \Route::is('datmas.golbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Golongan Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.penjab') }}" class="nav-link {{ \Route::is('datmas.penjab') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Penanggung Jawab</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.cacat') }}" class="nav-link {{ \Route::is('datmas.cacat') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Cacat Fisik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perusahaan') }}" class="nav-link {{ \Route::is('datmas.perusahaan') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Perusahaan Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.aturanpake') }}" class="nav-link {{ \Route::is('datmas.aturanpake') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Aturan Pakai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.berkas') }}" class="nav-link {{ \Route::is('datmas.berkas') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Berkas Digital</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.bank') }}" class="nav-link {{ \Route::is('datmas.bank') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Bank</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.bidang') }}" class="nav-link {{ \Route::is('datmas.bidang') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Bidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.depart') }}" class="nav-link {{ \Route::is('datmas.depart') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Departemen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.emergency') }}" class="nav-link {{ \Route::is('datmas.emergency') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Emergency</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.jenjab') }}" class="nav-link {{ \Route::is('datmas.jenjab') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Jenjang Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.keljab') }}" class="nav-link {{ \Route::is('datmas.keljab') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Kelompok Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.pendidikan') }}" class="nav-link {{ \Route::is('datmas.pendidikan') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Pendidikan Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.resiko') }}" class="nav-link {{ \Route::is('datmas.resiko') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Resiko Kerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.statker') }}" class="nav-link {{ \Route::is('datmas.statker') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Status Kerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.statwp') }}" class="nav-link {{ \Route::is('datmas.statwp') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Status Wajib Pajak</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.metcik') }}" class="nav-link {{ \Route::is('datmas.metcik') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Metode Racik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.ok') }}" class="nav-link {{ \Route::is('datmas.ok') ? 'active' : '' }}">
                            <i class="fa-solid fa-clock" style="color: #63E6BE;"></i>
                          <p>Ruang OK</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{ route('setweb') }}"
                    class="nav-link {{ \Route::is('setweb') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <p style="margin-left: 10px;">
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
