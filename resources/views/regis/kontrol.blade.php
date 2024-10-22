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
                        <form action="{{ route('regis.kontrol.add') }}" method="POST" enctype="multipart/form-data" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="mb-3 col-md-3">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user icon-spacing"></i>Kelola Pasien</h5>
                                    </div>
                                    <div class="card-body">
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
                            <div class="md-3 col-md-9">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="diagnosa">Diagnosa</label>
                                                <input type="text" class="form-control" id="diagnosa" name="diagnosa">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tindakan">Tindakan/Terapi</label>
                                                <input type="text" class="form-control" id="tindakan" name="tindakan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="alasan_kontrol">Alasan Kontrol</label>
                                                <textarea class="form-control" id="alasan_kontrol" name="alasan_kontrol"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut</label>
                                                <textarea class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tgl_surat">Tanggal Surat</label>
                                                <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tgl_datang">Tanggal Datang</label>
                                                <input type="date" class="form-control" id="tgl_datang" name="tgl_datang">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <!-- Tombol di kiri bawah (opsional jika diperlukan) -->
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger">Selesai</button>
                                            </div>
                                            <div class="text-right col-md-6"> <!-- Tombol di kanan bawah -->
                                                <button type="button" class="btn btn-warning">Kontrol BPJS</button>
                                            </div>
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
                        <div class="card-header">
                            <h3 class="mb-0 card-title"> Data Surat Kontrol</h3>
                        </div>
                        <div class="card-body">
                            <table id="kontrol-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Diagnosa</th>
                                        <th>Tindakan/Terapi</th>
                                        <th>Alasan Kontrol</th>
                                        <th>Rencana Tindak Lanjut</th>
                                        <th>Tanggal Datang</th>
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kontrol as $data)
                                    <tr>
                                        <td>{{ $data->diagnosa }}</td>
                                        <td>{{ $data->tindakan }}</td>
                                        <td>{{ $data->alasan_kontrol }}</td>
                                        <td>{{ $data->rencana_tindak_lanjut }}</td>
                                        <td>{{ $data->tgl_datang }}</td>
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
    // Set tanggal hari ini pada kolom Tanggal Surat
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];  // Mendapatkan tanggal hari ini dalam format yyyy-mm-dd
        document.getElementById('tgl_surat').value = today;  // Set nilai input date
    });
</script>

    <script>
        $(document).ready(function() {
            $("#kontrol-table").DataTable({
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
