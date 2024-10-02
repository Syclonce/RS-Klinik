@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="row d-flex">
                            <!-- Card keluar disaat tekan button pasien -->
                            <div class="col-md-12 mb-3" id="kecelakan-col" style="display: none;"> <!-- Add margin bottom -->
                                <div class="card h-100" id="kecelakan-card" style="display: none;">
                                    <div class="card-header bg-light" id="kecelakan-header" style="display: none;">
                                        <h5><i class="fa fa-user"></i> Pilih Data Pasien</h5>
                                    </div>
                                    <div class="card-body" id="kecelakan-section" style="display: none;">
                                        <table id="patienttbl" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No. RM</th>
                                                    <th>Nama Pasien</th>
                                                    <th>Tgl. Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Alamat</th>
                                                    <th>No. Telepon</th>
                                                    <th width="15%">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Identitas Pasien -->
                            <div class="col-md-6 mb-3"> <!-- Add margin bottom -->
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Kelola Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="timepicker">Jam</label>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" class="form-control timepicker-input" data-target="#timepicker" id="time" name="time">
                                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="nama">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Cari nama pasien">
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label> <!-- Add an empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="search-button">Cari nama</button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="dokter">Dokter</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="dokter" name="dokter">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($dokter as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-5">
                                                <label for="penjamin">Penjamin</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="penjamin" name="penjamin">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($penjab as $data)
                                                        <option value="{{ $data->id }}">{{ $data->pj }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="no_reg">No. Reg</label>
                                                <input type="text" class="form-control" id="no_reg" name="no_reg">
                                            </div>
                                            <div class="col-md-3">
                                                <label>&nbsp;</label> <!-- Add an empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="generate-reg-button">Generate Registrasi</button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <label for="no_rawat">No. Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat">
                                            </div>
                                            <div class="col-md-3">
                                                <label>&nbsp;</label> <!-- Add an empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="generate-no-rawat-button">Generate No Rawat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Identitas Pasien -->
                            <div class="col-md-6 mb-3"> <!-- Add margin bottom -->
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rm">Nomor RM</label>
                                                <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Nomor Rekam Medis" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="seks">Jenis Kelamin</label>
                                                <input type="text" class="form-control" id="seks" name="seks" placeholder="Jenis Kelamin Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="telepon">Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon Pasien" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Pasien</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patienttbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. RM</th>
                                            <th>Nama Pasien</th>
                                            <th>ID. Kunjungan</th>
                                            <th>Antrian</th>
                                            <th>Poliklinik</th>
                                            <th>Dokter</th>
                                            <th>Penjamin</th>
                                            <th>No. Asuransi</th>
                                            <th>Tgl. Kunjungan</th>
                                            <th>Stts. Periksa</th>
                                            <th>Stts. Lanjut</th>
                                            <th>Stts. Bayar</th>
                                            <th width="10%">Pilihan</th>
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
        $(document).ready(function () {
            // Ketika input no_rawat di klik
            $('#no_rawat').on('focus', function () {
                // Lakukan permintaan AJAX untuk generate no rawat
                $.ajax({
                    url: '{{ route("generate.no_rawat") }}',
                    type: 'GET',
                    success: function (data) {
                        // Set nilai input dengan nomor rawat yang dihasilkan
                        $('#no_rawat').val(data.no_rawat);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Ketika input No. Reg di-klik
            $('#no_reg').on('click', function() {
                // Panggil AJAX untuk mendapatkan nomor registrasi terbaru
                $.ajax({
                    url: '{{ route('getLatestRegNumber') }}', // Panggil route yang kita buat
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Isi input field dengan nomor registrasi terbaru
                        $('#no_reg').val(data.no_reg);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan error di konsol jika terjadi kesalahan
                    }
                });
            });
        });
    </script>

    <script>
        const searchButton = document.getElementById('search-button');
        const kecelakanSection = document.getElementById('kecelakan-section');
        const kecelakanHeader = document.getElementById('kecelakan-header');
        const kecelakanCard = document.getElementById('kecelakan-card');
        const kecelakanCol = document.getElementById('kecelakan-col');

        searchButton.addEventListener('click', function() {
            const isCurrentlyVisible = kecelakanSection.style.display === 'block';

            if (isCurrentlyVisible) {
                // Hide section if it is currently visible
                kecelakanSection.style.display = 'none';
                kecelakanHeader.style.display = 'none';
                kecelakanCard.style.display = 'none';
                kecelakanCol.style.display = 'none';
            } else {
                // Show section if it is currently hidden
                kecelakanSection.style.display = 'block';
                kecelakanHeader.style.display = 'block';
                kecelakanCard.style.display = 'block';
                kecelakanCol.style.display = 'block';
            }
        });
    </script>
@endsection
