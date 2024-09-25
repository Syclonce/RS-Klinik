@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Identitas Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="no_rm">No RM</label>
                                                <select id="no_rm" name="no_rm" class="form-control">
                                                    <option value="">--- Cari RM ---</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <button type="button" class="btn btn-primary mr-2">Cari RM</button>
                                                <button type="button" class="btn btn-success">Pasien Baru</button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="ktp">No KTP</label>
                                                <input type="text" class="form-control" id="ktp" name="ktp" placeholder="No KTP">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="satusehat" name="satusehat" placeholder="No Satusehat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur Saat Ini">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                        </div>

                                        <!-- New select dropdown for activating Kecelakan -->
                                        <div class="form-group">
                                            <label for="activate_kecelakan">Apakah pasien Kecelakan</label>
                                            <select id="activate_kecelakan" name="activate_kecelakan" class="form-control">
                                                <option value="">--- Pilih ---</option>
                                                <option value="1">Ya</option>
                                                <option value="0">Tidak</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-header" id="kecelakan-header" style="display: none;">
                                        <h5><i class="fa fa-user"></i> Pasien Kecelakan</h5>
                                    </div>
                                    <div class="card-body" id="kecelakan-section" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jeskec">Jenis Kecelakaan</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih Jenis Kecelakaan ---</option>
                                                    <option value="1">Kecelakaan Ringan</option>
                                                    <option value="2">Kecelakaan Sedang</option>
                                                    <option value="3">Kecelakaan Berat</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nopol">No Pol</label>
                                                <input type="text" class="form-control" id="nopol" name="nopol">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tglkej">Tanggal Kejadian</label>
                                                <input type="date" class="form-control" id="tglkej" name="tglkej">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Penjamin">Penjamin</label>
                                                <select id="Penjamin" name="Penjamin" class="form-control">
                                                    <option value="">--- Cari Penjamin ---</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="ket">Keterangan</label>
                                                <input type="text" class="form-control" id="ket" name="ket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Identitas Pasien -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i>   Pendaftaran IGD</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="jeskec">Dokter</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih Jenis Kecelakaan ---</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="jeskec">Penjamin</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih Jenis Kecelakaan ---</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-end">
                                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5><i class="fa fa-user"></i> Penanggung jawab</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="jeskec">Hubungan Pasien</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih ---</option>
                                                    <option value="kepala_keluarga">Kepala Keluarga</option>
                                                    <option value="suami">Suami</option>
                                                    <option value="istri">Istri</option>
                                                    <option value="anak">Anak</option>
                                                    <option value="menantu">Menantu</option>
                                                    <option value="cucu">Cucu</option>
                                                    <option value="orang_tua">Orang Tua</option>
                                                    <option value="menantu">Mertua</option>
                                                    <option value="keluarga_lain">Keluarga Lain</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nopol">Nama Keluarga</label>
                                                <input type="text" class="form-control" id="nopol" name="nopol">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="jenis_kartu">Jenis Kartu</label>
                                                <select id="jenis_kartu" name="jenis_kartu" class="form-control">
                                                    <option value="">--- Pilih Jenis Kartu ---</option>
                                                    <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
                                                    <option value="sim">Surat Izin Mengemudi (SIM)</option>
                                                    <option value="pelajar">Kartu Pelajar</option>
                                                    <option value="passport">Passport</option>
                                                    <option value="kitas">Kartu Izin Sementara (KITAS)</option>
                                                    <option value="kitap">Kartu Izin Tetap (KITAP)</option>
                                                    <option value="ktpwna">KTP WNA</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="no_kartu" name="no_kartu" placeholder="No. Kartu">
                                            </div>
                                        </div>

                                        <div class="card-footer d-flex justify-content-end">
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="button" class="btn" style="background-color: #ff851b; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                            </button>
                                        </div>
                                    </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Pasien</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patienttbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Nama Dokter</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script>
        // Function to toggle the Kecelakan section and header
        document.getElementById('activate_kecelakan').addEventListener('change', function() {
            const kecelakanSection = document.getElementById('kecelakan-section');
            const kecelakanHeader = document.getElementById('kecelakan-header');
            if (this.value === '1') {
                kecelakanSection.style.display = 'block'; // Show section if "Ya" is selected
                kecelakanHeader.style.display = 'block'; // Show header
            } else {
                kecelakanSection.style.display = 'none'; // Hide section if "Tidak" is selected
                kecelakanHeader.style.display = 'none'; // Hide header
            }
        });

        // Optionally handle the 'jenis kecelakaan' change to show/hide Kecelakan section
        document.getElementById('jeskec').addEventListener('change', function() {
            const kecelakanSection = document.getElementById('kecelakan-section');
            const kecelakanHeader = document.getElementById('kecelakan-header');
            if (this.value) {
                kecelakanSection.style.display = 'block'; // Show section if an option is selected
                kecelakanHeader.style.display = 'block'; // Show header
            } else {
                kecelakanSection.style.display = 'none'; // Hide section if no option is selected
                kecelakanHeader.style.display = 'none'; // Hide header
            }
        });
    </script>
@endsection
