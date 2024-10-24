
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

            {{-- Registaris Menu --}}
            <li class="nav-item {{ \Route::is('regis*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('regis*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Registrasi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('regis.patient') }}" class="nav-link {{ \Route::is('regis.patient') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Pasien Baru
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regis.rajal') }}" class="nav-link {{ \Route::is('regis.rajal') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Rawat Jalan
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regis.ranap') }}" class="nav-link {{ \Route::is('regis.ranap') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Rawat Inap
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('regis') }}" class="nav-link {{ \Route::is('regis') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                        UGD/IGD
                      </p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- Keuangan Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Keuangan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Kasir
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Keuangan
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.poli') }}" class="nav-link {{ \Route::is('doctor.poli') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Akutansi
                      </p>
                    </a>
                  </li>
                </ul>
            </li>

            {{-- APOTIK --}}

            {{-- Penjualan Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Penjualan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Laboratorium
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Radiologi
                      </p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- Layanan Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Layanan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Rawat Jalan
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Rawat Inap
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        UGD/IGD
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Kamar Operasi
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Ruang VK
                      </p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- SMD Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Sumber Daya Manusia
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Personalia
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Payroll
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Absebsi
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Cuti
                      </p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- Gizi Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Gizi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Gizi klinik
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Penyediaan Makanan
                      </p>
                    </a>
                  </li>
                </ul>
            </li>
            {{-- Gudang Menu --}}
            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    Gudang
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('doctor.spesiali') }}" class="nav-link {{ \Route::is('doctor.spesiali') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Gudang Obat
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('doctor.visit') }}" class="nav-link {{ \Route::is('doctor.visit') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Gudang Umum
                      </p>
                    </a>
                  </li>
                </ul>
            </li>

            {{-- Data Master --}}
            <li class="nav-item {{ \Route::is('datmas.*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('datmas.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-bed" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('datmas.icd') }}" class="nav-link {{ \Route::is('datmas.icd') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">ICD 9 dan 10</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.bangsal') }}" class="nav-link {{ \Route::is('datmas.bangsal') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Bangsal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.dabar') }}" class="nav-link {{ \Route::is('datmas.dabar') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Data Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perjal') }}" class="nav-link {{ \Route::is('datmas.perjal') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Perawatan Rawat Jalan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.pernap') }}" class="nav-link {{ \Route::is('datmas.pernap') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Perawatan Rawat Inap</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perlogi') }}" class="nav-link {{ \Route::is('datmas.perlogi') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Perawatan Radiologi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katbar') }}" class="nav-link {{ \Route::is('datmas.katbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Kategori Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katpen') }}" class="nav-link {{ \Route::is('datmas.katpen') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Kategori Penyakit</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.katper') }}" class="nav-link {{ \Route::is('datmas.katper') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Kategori Perawatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.satuan') }}" class="nav-link {{ \Route::is('datmas.satuan') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Kode Satuan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.jenbar') }}" class="nav-link {{ \Route::is('datmas.jenbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Jenis Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.industri') }}" class="nav-link {{ \Route::is('datmas.industri') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Industri Farmasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.golbar') }}" class="nav-link {{ \Route::is('datmas.golbar') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Golongan Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.penjab') }}" class="nav-link {{ \Route::is('datmas.penjab') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Penanggung Jawab</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.cacat') }}" class="nav-link {{ \Route::is('datmas.cacat') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Cacat Fisik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.perusahaan') }}" class="nav-link {{ \Route::is('datmas.perusahaan') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Perusahaan Pasien</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.aturanpake') }}" class="nav-link {{ \Route::is('datmas.aturanpake') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Aturan Pakai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.berkas') }}" class="nav-link {{ \Route::is('datmas.berkas') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Berkas Digital</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.bank') }}" class="nav-link {{ \Route::is('datmas.bank') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Bank</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.bidang') }}" class="nav-link {{ \Route::is('datmas.bidang') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Bidang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.depart') }}" class="nav-link {{ \Route::is('datmas.depart') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Departemen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.emergency') }}" class="nav-link {{ \Route::is('datmas.emergency') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Emergency</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.jenjab') }}" class="nav-link {{ \Route::is('datmas.jenjab') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Jenjang Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.keljab') }}" class="nav-link {{ \Route::is('datmas.keljab') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Kelompok Jabatan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.pendidikan') }}" class="nav-link {{ \Route::is('datmas.pendidikan') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Pendidikan Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.resiko') }}" class="nav-link {{ \Route::is('datmas.resiko') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Resiko Kerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.statker') }}" class="nav-link {{ \Route::is('datmas.statker') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Status Kerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.statwp') }}" class="nav-link {{ \Route::is('datmas.statwp') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Status Wajib Pajak</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.metcik') }}" class="nav-link {{ \Route::is('datmas.metcik') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Metode Racik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.ok') }}" class="nav-link {{ \Route::is('datmas.ok') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Ruang OK</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('datmas.rujukan') }}" class="nav-link {{ \Route::is('datmas.rujukan') ? 'active' : '' }}">
                            <i class="fa-solid fa-hand-point-right" style="color: #63E6BE;"></i>
                          <p style="margin-left: 10px;">Rujukan</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- P-Care --}}
            <li class="nav-item {{ \Route::is('pcare*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('pcare*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
                    P-Care
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('pcare.dokter') }}" class="nav-link {{ \Route::is('pcare.dokter') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-book-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;">
                      Dokter
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.polifktp') }}" class="nav-link {{ \Route::is('pcare.polifktp') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Poli FKTP
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.polifktl') }}" class="nav-link {{ \Route::is('pcare.polifktl') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Poli FKTL
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.icd10') }}" class="nav-link {{ \Route::is('pcare.icd10') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        ICD 10
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.icd9') }}" class="nav-link {{ \Route::is('pcare.icd9') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        ICD 9
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.kesadaran') }}" class="nav-link {{ \Route::is('pcare.kesadaran') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Kesadaran
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.obats') }}" class="nav-link {{ \Route::is('pcare.obats') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Obat DPHO
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.provider') }}" class="nav-link {{ \Route::is('pcare.provider') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Provider
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.spesialis') }}" class="nav-link {{ \Route::is('pcare.spesialis') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Spesiailis
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.sarana') }}" class="nav-link {{ \Route::is('pcare.sarana') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Sarana
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('pcare.khusus') }}" class="nav-link {{ \Route::is('pcare.khusus') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-house-medical" style="color: #63E6BE;"></i>
                      <p style="margin-left: 10px;" >
                        Khusus
                      </p>
                    </a>
                  </li>
                </ul>
            </li>

            <hr>

            <li class="nav-item {{ \Route::is('doctor*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('doctor*') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-solid fa-user-doctor" style="color: #63E6BE; font-size: 1.2rem;"></i>
                  <p style="margin-left: 10px;">
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
                      <p>Tarif Kunjungan Dokter</p>
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

            {{-- <li class="nav-item {{ \Route::is('patient*') ? 'menu-open' : '' }}">
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
            </li> --}}

            {{-- <li class="nav-item {{ \Route::is('regis*') ? 'menu-open' : '' }}">
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
            </li> --}}


            {{-- <li class="nav-item {{ \Route::is('schedule*') ? 'menu-open' : '' }}">
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
            </li> --}}

            <li class="nav-item {{ \Route::is('sdm*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('sdm*') ? 'active' : '' }}">
                    <i class="fa-solid fa-people-group" style="color: #63E6BE;"></i>
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

            {{-- <li class="nav-item {{ \Route::is('finance*') ? 'menu-open' : '' }}">
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
                    <li class="nav-item">
                      <a href="{{ route('farmasi.opname') }}" class="nav-link {{ \Route::is('farmasi.opname') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Stok Opname</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('farmasi.obat') }}" class="nav-link {{ \Route::is('farmasi.obat') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Obat & BHP</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('farmasi.pengaturan') }}" class="nav-link {{ \Route::is('farmasi.pengaturan') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-solid fa-square-poll-horizontal" style="color: #63E6BE;"></i>
                        <p>Pengaturan</p>
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
                    <i class="fafa-ticket" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Antrian
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('antrian') }}" class="nav-link {{ \Route::is('antrian') ? 'active' : '' }}">
                            <i class="fafa-ticket" style="color: #63E6BE;"></i>
                          <p> Antrian Loket</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('radiologi*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('radiologi*') ? 'active' : '' }}">
                    <i class="fa-solid fa-x-ray" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Radiologi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('radiologi') }}" class="nav-link {{ \Route::is('radiologi') ? 'active' : '' }}">
                            <i class="fa-solid fa-x-ray" style="color: #63E6BE;"></i>
                          <p>Tambah Radiologi</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('laboratorium*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('laboratorium*') ? 'active' : '' }}">
                    <i class="fa-solid fa-flask-vial" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Laboratorium
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('laboratorium') }}" class="nav-link {{ \Route::is('laboratorium') ? 'active' : '' }}">
                            <i class="fa-solid fa-flask-vial" style="color: #63E6BE;"></i>
                          <p>Tambah Laboratorium</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('utd*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('utd*') ? 'active' : '' }}">
                    <i class="fa-solid fa-heart" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    UTD
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('utd') }}" class="nav-link {{ \Route::is('utd') ? 'active' : '' }}">
                            <i class="fa-solid fa-droplet" style="color: #63E6BE;"></i>
                          <p>Data Pendonor</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('utd.datadonor') }}" class="nav-link {{ \Route::is('utd.datadonor') ? 'active' : '' }}">
                            <i class="fa-solid fa-droplet" style="color: #63E6BE;"></i>
                          <p>Data Donor</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('utd.stokdarah') }}" class="nav-link {{ \Route::is('utd.stokdarah') ? 'active' : '' }}">
                            <i class="fa-solid fa-droplet" style="color: #63E6BE;"></i>
                          <p>Stok Darah</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('utd.komponendarah') }}" class="nav-link {{ \Route::is('utd.komponendarah') ? 'active' : '' }}">
                            <i class="fa-solid fa-flask-vial" style="color: #63E6BE;"></i>
                          <p>Komponen Darah</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ \Route::is('penjualan*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ \Route::is('penjualan*') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping" style="color: #63E6BE;"></i>
                  <p style="margin-left: 10px;">
                    Penjualan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('penjualan.pjl') }}" class="nav-link {{ \Route::is('penjualan.pjl') ? 'active' : '' }}">
                            <i class="fa-solid fa-file" style="color: #63E6BE;"></i>
                          <p>Penjualan</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('penjualan') }}" class="nav-link {{ \Route::is('penjualan') ? 'active' : '' }}">
                            <i class="fa-solid fa-file" style="color: #63E6BE;"></i>
                          <p>Data Barang</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('penjualan.order') }}" class="nav-link {{ \Route::is('penjualan.order') ? 'active' : '' }}">
                            <i class="fa-solid fa-file" style="color: #63E6BE;"></i>
                          <p>Order Baru</p>
                        </a>
                    </li>
                </ul>
            </li> --}}




            <li class="nav-item">
                <a href="{{ route('wagateway') }}"
                    class="nav-link {{ \Route::is('wagateway') ? 'active' : '' }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <p style="margin-left: 10px;">
                        Wa Getway
                    </p>
                </a>
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
