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
                                {{-- <div class="card-body" id="kecelakan-section" style="display: none;">
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
                                </div> --}}
                            </div>
                        </div>

                        <!-- Start Form -->
                        <form action="{{ route('regis.berkas.add') }}" method="POST" enctype="multipart/form-data" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="mb-3 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i>Kelola Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="timepicker">Jam</label>
                                                <input type="time" class="form-control" id="time" name="time">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="id_rawat">ID Rawat</label>
                                                <input type="text" class="form-control" id="id_rawat" name="id_rawat" value="{{$rajaldata->no_rawat}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rm">Nomor RM</label>
                                                <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{$rajaldata->no_rm}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" value="{{$rajaldata->nama_pasien}}" name="nama_pasien" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pasien -->
                            <div class="md-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="kategori_berkas">Kategori Berkas</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="berkas_kategori" name="berkas_kategori">
                                                    <option value="">--Pilih--</option>
                                                    <option value="Berkas Digital">Berkas Digital</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                    <label for="pilih_berkas">Pilih Berkas</label>
                                                    <button type="button" class="btn btn-primary" id="chooseFileBtn">Choose File</button>
                                                  </div>
                                                  <div class="col-md-10 d-flex align-items-end">
                                                    <input type="file" class="form-control d-none" id="pilih_berkas" name="pilih_berkas">
                                                    <input type="text" class="mt-2 form-control" id="file_name" placeholder="Nama Pasien" readonly>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-regular fa-floppy-disk" style="color: #63E6BE; margin-right: 5px;"></i> Unggah Berkas
                                        </button>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="fa-solid fa-check" style="color: #63E6BE; margin-right: 5px;"></i> Selesai
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <div class="mt-3 col-12">
                <!-- /.card-header -->
                    <div class="card">
                        <div class="card-body">
                            <table id="berkas-digital-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Rawat</th>
                                        <th>Kategori Berkas</th>
                                        <th>Pilih Berkas</th>
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berkasdigital as $data)
                                    <tr>
                                        <td>{{ $data->id_rawat }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td><a href="{{ asset('uploads/' .$data->nama) }}">{{ $data->nama }}</a></td>
                                        <td>----</td>
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
    document.getElementById('chooseFileBtn').addEventListener('click', function() {
      document.getElementById('pilih_berkas').click();
    });

    document.getElementById('pilih_berkas').addEventListener('change', function() {
      document.getElementById('file_name').value = this.files[0].name;
    });
  </script>
    {{-- Script untuk umur dan tgl jam --}}
    <script>
        window.onload = function() {
            // Mengambil tanggal dan waktu saat ini
            var now = new Date();

            // Mengatur nilai input tanggal (YYYY-MM-DD)
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + month + "-" + day;
            document.getElementById("tanggal").value = today;

            // Mengatur nilai input waktu (HH:MM)
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var currentTime = hours + ":" + minutes;
            document.getElementById("time").value = currentTime;
        };
    </script>

<script>
    $(document).ready(function() {
        // Event listener untuk klik pada link Berkas Digital
        $('.berkas-digital').on('click', function(e) {
            e.preventDefault();
            var no_rm = $(this).data('norm'); // Mengambil nomor RM dari atribut data

            // AJAX request untuk mengambil data pasien berdasarkan nomor RM
            $.ajax({
                url: '/regis/berkas/' + no_rm, // Menggunakan route yang sesuai dengan nomor RM
                method: 'GET',
                success: function(response) {
                    // Mengisi form dengan data yang diterima
                    $('#id_rawat').val(response.id_rawat).prop('readonly', true);
                    $('#no_rm').val(response.no_rm).prop('readonly', true);
                    $('#nama_pasien').val(response.nama_pasien).prop('readonly', true);
                    $('#tanggal').val(response.tanggal).prop('readonly', true);
                    $('#time').val(response.time).prop('readonly', true);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>

    <script>
        $(document).ready(function() {
            $("#berkas-digital-table").DataTable({
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
