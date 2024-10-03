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
                        <div class="col-md-12 mb-3" id="kecelakan-col" style="display: none;">
                            <!-- Add margin bottom -->
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
                                            <!-- Table data will be populated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Start Form -->
                        <form action="{{ route('laboratorium.add') }}" method="POST" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Kelola Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tgl_kunjungan">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan">
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
                                                <label>&nbsp;</label>
                                                <!-- Empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="search-button">Cari</button>
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
                                                <label>&nbsp;</label>
                                                <!-- Empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="generate-reg-button">Generate Reg</button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-9">
                                                <label for="no_rawat">No. Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat">
                                            </div>
                                            <div class="col-md-3">
                                                <label>&nbsp;</label>
                                                <!-- Empty label for spacing -->
                                                <button type="button" class="btn btn-primary btn-block" id="generate-no-rawat-button">Generate No Rawat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pasien -->
                            <div class="col-md-6 mb-3">
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
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pasien" readonly>
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

                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-block" style="max-width: 500px;">Kirim ke Laboratorium</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Pasien - Laboratorium</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="patient-visit-table" class="table table-bordered table-striped">
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
                                    @foreach ($lab as $data)
                                            <tr>
                                                <td>{{ $data->no_rm }}</td>
                                                <td>{{ $data->nama_pasien }}</td>
                                                <td>{{ $data->no_rawat }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->doctor->poli->nama_poli }}</td>
                                                <td>{{ $data->doctor->nama }}</td>
                                                <td>{{ $data->penjab->pj }}</td>
                                                <td>{{ $data->pasien->no_bpjs }}</td>
                                                <td>{{ $data->tgl_kunjungan }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
    $(document).ready(function() {
        const searchButton = document.getElementById('search-button');
        const kecelakanSection = document.getElementById('kecelakan-section');
        const kecelakanHeader = document.getElementById('kecelakan-header');
        const kecelakanCard = document.getElementById('kecelakan-card');
        const kecelakanCol = document.getElementById('kecelakan-col');

        // Event listener ketika tombol search diklik
        $('#search-button').click(function() {
            // Ambil nilai dari input nama
            var namaPasien = $('#nama').val();

            // Panggil AJAX ke server untuk mencari pasien
            $.ajax({
                url: '/search-pasien-lab', // Sesuaikan URL untuk route baru
                method: 'GET',
                data: { nama: namaPasien },
                success: function(response) {
                    // Kosongkan tabel sebelum mengisi data baru
                    $('#patienttbl tbody').empty();

                    // Periksa apakah ada hasil
                    if (response.length > 0) {
                        // Looping melalui hasil dan tambahkan ke tabel
                        $.each(response, function(index, pasien) {
                            var row = '<tr>' +
                                '<td>' + pasien.no_rm + '</td>' +
                                '<td>' + pasien.nama + '</td>' +
                                '<td>' + pasien.tanggal_lahir + '</td>' +
                                '<td>' + pasien.seks + '</td>' +
                                '<td>' + pasien.Alamat + '</td>' +
                                '<td>' + pasien.telepon + '</td>' +
                                '<td>' +
                                    '<button class="btn btn-primary select-patient" data-id="' + pasien.no_rm + '" data-nama="' + pasien.nama + '" data-tgl="' + pasien.tanggal_lahir + '" data-seks="' + pasien.seks + '" data-telepon="' + pasien.telepon + '" data-alamat="' + pasien.Alamat + '">Pilih</button>' +
                                '</td>' +
                                '</tr>';
                            $('#patienttbl tbody').append(row);
                        });
                    } else {
                        // Jika tidak ada hasil, tampilkan pesan kosong
                        $('#patienttbl tbody').append('<tr><td colspan="7">Pasien tidak ditemukan</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error searching pasien:', error);
                }
            });

            // Logika tambahan untuk toggle kecelakanSection
            const isCurrentlyVisible = kecelakanSection.style.display === 'block';

            if (isCurrentlyVisible) {
                // Sembunyikan jika sedang terlihat
                kecelakanSection.style.display = 'none';
                kecelakanHeader.style.display = 'none';
                kecelakanCard.style.display = 'none';
                kecelakanCol.style.display = 'none';
            } else {
                // Tampilkan jika sedang tersembunyi
                kecelakanSection.style.display = 'block';
                kecelakanHeader.style.display = 'block';
                kecelakanCard.style.display = 'block';
                kecelakanCol.style.display = 'block';
            }
        });

        // Event listener untuk tombol "Pilih"
        $(document).on('click', '.select-patient', function() {
            // Ambil data dari atribut tombol
            var noRm = $(this).data('id');
            var nama = $(this).data('nama');
            var tglLahir = $(this).data('tgl');
            var seks = $(this).data('seks');
            var alamat = $(this).data('alamat');
            var telepon = $(this).data('telepon');

            // Isi field input di form dengan data pasien yang dipilih
            $('#no_rm').val(noRm);
            $('#nama_pasien').val(nama);
            $('#tgl_lahir').val(tglLahir);
            $('#seks').val(seks);
            $('#alamat').val(alamat);
            $('#telepon').val(telepon);
        });

        // AJAX untuk generate nomor registrasi laboratorium
        $('#generate-reg-button').click(function() {
            $.ajax({
                url: '/generate-no-reg-lab', // Sesuaikan dengan route baru
                type: 'GET',
                success: function(response) {
                    // Menampilkan nomor registrasi di input field
                    $('#no_reg').val(response.no_reg);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Gagal menghasilkan nomor registrasi.');
                }
            });
        });

        // AJAX untuk generate nomor rawat laboratorium
        $('#generate-no-rawat-button').click(function() {
            $.ajax({
                url: '/generate-no-rawat-lab', // Sesuaikan dengan route baru
                method: 'GET',
                success: function(response) {
                    // Set nilai input dengan nomor rawat yang dihasilkan
                    $('#no_rawat').val(response.no_rawat);
                },
                error: function(xhr, status, error) {
                    console.error('Error generating No. Rawat:', error);
                }
            });
        });
    });
</script>

@endsection
