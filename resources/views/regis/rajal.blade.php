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
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-6">
                                <div class="card h-100 w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Identitas Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="no_rm">No RM</label>
                                                    <select id="no_rm" name="no_rm" class="form-control">
                                                        <option value="">--- Cari RM ---</option>
                                                        @foreach ($pasien as $pasien)
                                                        <option value="{{$pasien->no_rm}}">{{$pasien->no_rm}}</option>
                                                        @endforeach
                                                        <!-- Add options dynamically -->
                                                    </select>
                                                </div>
                                                <div class="col-md-4 d-flex align-items-end">
                                                    <button type="button" class="btn btn-primary mr-2">Cari RM</button>
                                                    <a href="{{ route('patient') }}" class="btn btn-success">Pasien Baru</a>
                                                    {{-- <button type="button"  class="btn btn-success">Pasien Baru</button> --}}
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
                                            <div class="col-md-8">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur Saat Ini">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Poli Tujuan -->
                            <div class="col-md-6">
                                <div class="card h-100 w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Poli Tujuan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tglpol">Tanggal</label>
                                                <input type="date" class="form-control" id="tglpol" name="tglpol">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="poli">Pilih Poli</label>
                                                <select class="form-control select2bs4"  style="width: 100%;"  id="poli" name="poli">
                                                    <option value="" disabled selected>--- Pilih Poli ---</option>
                                                    @foreach ($poli as $poli)
                                                    <option value="{{$poli->id}}">{{$poli->nama_poli}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="dokter">Dokter </label>
                                                <select id="dokter" name="dokter" class="form-control">
                                                    @foreach ($dokter as $dokter)
                                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="id_dokter" name="id_dokter" placeholder="cooming soon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="pembayaran">Jenis Penjamin</label>
                                                <select id="pembayaran" name="pembayaran" class="form-control">
                                                    <option value="">--- Pilih Penjamin ---</option>
                                                    <option value="mandiri">Mandiri</option>
                                                    <option value="bpjs">BPJS</option>
                                                    <option value="asuransi">Asuransi</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-end">
                                                <input type="text" class="form-control" id="nomber" name="nomber" placeholder="No. Penjamin">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <div class="col-md-12 text-right">
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

                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Data Pendaftaran Pasien Rawat Jalan</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patienttbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Penjamin</th>
                                            <th>No. REG</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->id}}</td>
                                            <td>{{ $data->no_rm}}</td>
                                            <td>{{ $data->nama}}</td>
                                            <td>{{ $data->sex}}</td>
                                            <td>{{ $data->ktp}}</td>
                                            <td>{{ $data->satusehat}}</td>
                                            <td>{{ $data->tanggal_lahir}}</td>
                                            <td>{{ $data->umur}}</td>
                                            <td>{{ $data->alamat}}</td>
                                            <td>{{ $data->tglpol}}</td>
                                            <td>{{ $data->poli}}</td>
                                            <td>{{ $data->dokter}}</td>
                                            <td>{{ $data->id_dokter}}</td>
                                            <td>{{ $data->pembayaran}}</td>
                                            <td>{{ $data->nomber}}</td>
                                        </tr>
                                    @endforeach
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
        $(document).ready(function() {
            $("#patienttbl").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": false,
                "lengthChange": true, // Corrected: Removed conflicting lengthChange option
                "language": {
                    "lengthMenu": "Tampil  _MENU_",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                    "search": "Cari :",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Berikutnya"
                    }
                }
            });
        });
    </script>

<script>
    $(document).ready(function() {
        // Saat tombol "Cari RM" ditekan
        $('.btn-primary').click(function() {
            var no_rm = $('#no_rm').val(); // Ambil nilai No RM dari dropdown

            if (no_rm !== '') {
                // Lakukan AJAX request
                $.ajax({
                    url: '/regis/' + no_rm,  // Endpoint untuk mencari pasien berdasarkan No RM
                    type: 'GET',
                    success: function(data) {
                        // Isi setiap input field dengan data pasien
                        $('#nama').val(data.nama);
                        $('#sex').val(data.seks);
                        $('#ktp').val(data.nik);
                        $('#satusehat').val(data.kode_ihs);
                        var dateForInput = convertToDateInputFormat(data.tanggal_lahir);
                        $('#tanggal_lahir').val(dateForInput);
                        var umur = hitungUmur(new Date(data.tanggal_lahir));
                        $('#umur').val(umur); // Pastikan umur sudah dihitung di backend
                        $('#alamat').val(data.Alamat);
                    },
                    error: function(xhr) {
                        alert('Pasien tidak ditemukan');
                    }
                });
            } else {
                alert('Pilih No RM terlebih dahulu');
            }
        });

        function convertToDateInputFormat(dateString) {
            const [day, month, year] = dateString.split(/[-\/]/);
            return `${year}-${month}-${day}`;
        }

        // Fungsi untuk menghitung umur
        function hitungUmur(tanggalLahir) {
            var today = new Date(); // Tanggal saat ini
            var birthDate = new Date(tanggalLahir); // Tanggal lahir

            // Hitung tahun
            var ageYears = today.getFullYear() - birthDate.getFullYear();

            // Hitung perbedaan bulan
            var ageMonths = today.getMonth() - birthDate.getMonth();

            // Hitung perbedaan hari
            var ageDays = today.getDate() - birthDate.getDate();

            // Jika bulan saat ini belum melewati bulan lahir, kurangi umur setahun
            if (ageMonths < 0 || (ageMonths === 0 && ageDays < 0)) {
                ageYears--; // Kurangi setahun jika belum melewati bulan atau hari
                ageMonths += 12; // Tambahkan 12 bulan jika bulan belum melewati
            }

            // Jika hari ini belum melewati hari lahir, kurangi umur sebulan
            if (ageDays < 0) {
                // Dapatkan jumlah hari dalam bulan sebelumnya
                var lastMonth = new Date(today.getFullYear(), today.getMonth(), 0);
                ageDays += lastMonth.getDate(); // Tambahkan jumlah hari dari bulan sebelumnya
                ageMonths--; // Kurangi sebulan jika belum melewati hari
            }

            // Return umur dengan format detail (tahun, bulan, hari)
            return ageYears + " tahun, " + ageMonths + " bulan, " + ageDays + " hari";
        }

    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk mengambil tanggal hari ini dalam format 'YYYY-MM-DD'
        var today = new Date();
        var day = String(today.getDate()).padStart(2, '0'); // Tambahkan leading zero jika perlu
        var month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0, jadi tambahkan 1
        var year = today.getFullYear();

        var todayFormatted = year + '-' + month + '-' + day;

        // Set tanggal input menjadi hari ini
        $('#tglpol').val(todayFormatted);
    });
</script>

@endsection
