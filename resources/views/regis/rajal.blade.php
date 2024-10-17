@extends('template.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="mt-3 col-12">
                    <div class="row d-flex">
                        <div class="mb-3 col-md-12" id="kecelakan-col" style="display: none;">
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
                        <form action="{{ route('regis.rajal.add') }}" method="POST" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="mb-3 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Kelola Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tgl_kunjungan">Tanggal Daftar</label>
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
                                            <div class="col-md-6">
                                                <label for="poli">Poli</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="poli" name="poli">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($poli as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penjamin">Penjamin</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="penjamin" name="penjamin">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($penjab as $data)
                                                        <option value="{{ $data->id }}">{{ $data->pj }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="no_reg">No. Reg</label>
                                                <input type="text" class="form-control" id="no_reg" name="no_reg">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no_rawat">No. Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pasien -->
                            <div class="mb-3 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rm">Nomor RM</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Nomor Rekam Medis" readonly>
                                                    <div class="input-group-append" id="button-container" style="display: none;">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="action-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span id="action-button-text">Pilihan</span>
                                                        </button>
                                                    </div>
                                                </div>
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

                            <!-- Submit Button -->
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-block" style="max-width: 500px;">Kirim ke Radiologi</button>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>

                <div class="mt-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Pasien - Radiologi</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="kunjungan-table" class="table table-bordered table-striped">
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
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rajal as $data)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{ $data->no_rm }}</button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('soap',['norm' => $data->no_rm ]) }}">SOAP & Pemeriksaan    </a>
                                                    <a class="dropdown-item" href="{{ route('layanan',['norm' => $data->no_rm ]) }}">Layanan & Tindakan</a>
                                                    <a class="dropdown-item" href="{{ route('regis.berkas',['norm' => $data->no_rm ]) }}">Berkas Digital</a>
                                                    <a class="dropdown-item" href="#" id="statusRawat">Status Rawat</a>
                                                    <a class="dropdown-item" href="#" id="statusLanjut">Status Lanjut</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                              </div>
                                            </td>
                                            <td>{{ $data->nama_pasien }}</td>
                                            <td>{{ $data->no_rawat }}</td>
                                            <td>{{ $data->no_reg }}</td>
                                            <td>{{ $data->poli->nama_poli }}</td>
                                            <td>{{ $data->doctor->nama }}</td>
                                            <td>{{ $data->penjab->pj }}</td>
                                            <td>{{ $data->pasien->no_bpjs }}</td>
                                            <td>{{ $data->tgl_kunjungan }}</td>
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

<div class="modal fade" id="statusRawatModal" tabindex="-1" role="dialog" aria-labelledby="statusRawatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusRawatModalLabel">Status Rawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="statusForm">
                    <div class="form-group">
                        {{-- <label>Status Lanjut Pasien:</label><br> --}}
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="berkasDikirim" value="Berkas Dikirim">
                            <label class="form-check-label" for="berkasDikirim">Berkas Dikirim</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="berkasDiterima" value="Berkas Diterima">
                            <label class="form-check-label" for="berkasDiterima">Berkas Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="belumPeriksa" value="Belum Periksa">
                            <label class="form-check-label" for="belumPeriksa">Belum Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="sudahPeriksa" value="Sudah Periksa">
                            <label class="form-check-label" for="sudahPeriksa">Sudah Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="batalPeriksa" value="Batal Periksa">
                            <label class="form-check-label" for="batalPeriksa">Batal Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pasienDirujuk" value="Pasien Dirujuk">
                            <label class="form-check-label" for="pasienDirujuk">Pasien Dirujuk</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="meninggal" value="Meninggal">
                            <label class="form-check-label" for="meninggal">Meninggal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="dirawat" value="Dirawat">
                            <label class="form-check-label" for="dirawat">Dirawat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pulangPaksak" value="Pulang Paksa">
                            <label class="form-check-label" for="pulangPaksak">Pulang Paksa</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="okButton">Ok</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="statusLanjutModal" tabindex="-1" role="dialog" aria-labelledby="statusLanjutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusLanjutModalLabel">Status Lanjut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Pasien Ingin Dimasukkan Dalam Kamar Inap?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirmButton">Ya</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

    <script>
        window.onload = function() {
            // Mengambil tanggal dan waktu saat ini
            var now = new Date();

            // Mengatur nilai input tanggal (YYYY-MM-DD)
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + month + "-" + day;
            document.getElementById("tgl_kunjungan").value = today;

            // Mengatur nilai input waktu (HH:MM)
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var currentTime = hours + ":" + minutes;
            document.getElementById("time").value = currentTime;
        };
    </script>

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
                    url: '/search-pasien-rajal', // URL untuk request pencarian
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
                                    '<td>' + (pasien.seks ? pasien.seks.nama : 'Tidak Diketahui') + '</td>' +  // Menampilkan nama seks, jika tersedia
                                    '<td>' + pasien.Alamat + '</td>' +
                                    '<td>' + pasien.telepon + '</td>' +
                                    '<td>' +
                                        '<button class="btn btn-primary select-patient" data-id="' + pasien.no_rm + '" data-nama="' + pasien.nama + '" data-tgl="' + pasien.tanggal_lahir + '" data-seks="' + (pasien.seks ? pasien.seks.nama : '') + '" data-telepon="' + pasien.telepon + '">Pilih</button>' +
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

                // Tampilkan atau sembunyikan kecelakanSection
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
                var telepon = $(this).data('telepon');

                // Isi field input di card dengan data pasien yang dipilih
                $('#no_rm').val(noRm);
                $('#nama_pasien').val(nama);
                $('#tgl_lahir').val(tglLahir);
                $('#seks').val(seks);
                $('#telepon').val(telepon);

                // Sembunyikan kecelakanSection dan elemen terkait
                kecelakanSection.style.display = 'none';
                kecelakanHeader.style.display = 'none';
                kecelakanCard.style.display = 'none';
                kecelakanCol.style.display = 'none';
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Menjalankan AJAX saat input No. Reg difokuskan (diklik)
            $('#no_reg').focus(function() {
                $.ajax({
                    url: '/generate-no-reg-rajal', // URL ke controller yang menangani nomor registrasi
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
        });
    </script>

    <script>
        $(document).ready(function() {
            // Menjalankan AJAX saat input No. Rawat difokuskan (diklik)
            $('#no_rawat').focus(function() {
                $.ajax({
                    url: '/generate-no-rawat-rajal', // URL ke route yang menggenerate nomor rawat
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

    <script>
        $(document).ready(function() {
            $('#generate-no-rawat-button').click(function() {
                $.ajax({
                    url: '/generate-no-rawat', // URL yang mengarah ke route untuk generate nomor rawat
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

    <script>
        // Mendapatkan elemen
        const statusRawatButtons = document.querySelectorAll('#statusRawat');

        // Menambahkan event listener untuk setiap tombol Status Rawat
        statusRawatButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tautan default
                $('#statusRawatModal').modal('show'); // Menampilkan modal
            });
        });

        // Menangani aksi pada tombol konfirmasi
        document.getElementById('okButton').addEventListener('click', function() {
            $('#statusRawatModal').modal('hide'); // Menutup modal setelah konfirmasi
        });
    </script>

        <script>
            // Menambahkan event listener untuk tautan Status Lanjut
            document.getElementById('statusLanjut').addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah tautan default
                $('#statusLanjutModal').modal('show'); // Menampilkan modal
            });

            // Menangani aksi pada tombol konfirmasi
            document.getElementById('confirmButton').addEventListener('click', function() {
                alert("Pasien akan dimasukkan dalam kamar inap."); // Menampilkan alert
                $('#statusLanjutModal').modal('hide'); // Menutup modal setelah konfirmasi
                console.log("Pasien dimasukkan dalam kamar inap."); // Ganti dengan aksi yang sesuai
            });
        </script>

    <script>
        $(document).ready(function() {
            $("#patient-visit-table").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": true,
                "lengthChange": true,
                "buttons": ["csv", "excel", "pdf", "print"],
                "language": {
                    "lengthMenu": "Tampil  _MENU_",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                    "search": "Cari :",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Berikutnya"
                    }
                }
            }).buttons().container().appendTo('#doctortbl_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
