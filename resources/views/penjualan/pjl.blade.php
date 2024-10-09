@extends('template.app')

@section('content')
<<<<<<< HEAD
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row ">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Penjualan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctortbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Pembeli</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telpon</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                            <!-- <th width="20%">Pilihan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                         {{-- @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->id}}</td>
                                                <td>{{ $data->bangsal->nama_bangsal}}</td>
                                                <td>{{ $data->nomor_bed}}</td>
                                                <td>{{ 'Rp ' . number_format($data->harga, 0, ',', '.') }}</td>
                                                <td>{{ $data->kelaskamar->nama}}</td>
                                                <td>{{ $data->status}}</td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    {{-- <div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kamar.add') }}" method= "POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Kamar</label>
                                    <select class="select2bs4"  style="width: 100%;"  id="nama_kamar" name="nama_kamar">
                                        <option value="">--- Pilih bangsal ---</option>
                                        @foreach ($kode as $kode)
                                        <option value="{{$kode->kode_bangsal}}">{{$kode->nama_bangsal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <select class="select2bs4"  style="width: 100%;"  id="kelas" name="kelas">
                                        <option value="">--- Pilih bangsal ---</option>
                                        @foreach ($kelas as $kelas)
                                        <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nomor Bed</label>
                                    <input type="text" class="form-control" id="nomor_bed" name="nomor_bed">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select id="status" name="status" class="form-control">
                                         <option value="">--- Status ---</option>
                                         <option value="Aktif">Aktif</option>
                                         <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button> <!-- Submit button -->
                </div>
                </form>
            </div>
        </div>
    </div> --}}

    <script>
        $(document).ready(function() {
            $("#doctortbl").DataTable({
=======
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="row d-flex">
                        <!-- Start Form -->
                        <form action="{{ route('radiologi.add') }}" method="POST" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="col-md-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-cart-shopping"></i> Data Barang Penjualan</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Form Fields -->
                                        <div class="form-group row" id="id-row" style="display: none;">
                                            <div class="col-md-12" id="id-row" style="display: none;">
                                                <label for="id">ID</label>
                                                <input type="text" class="form-control" id="id" name="id">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="harga">Harga</label>
                                                <input type="text" class="form-control" id="harga" name="harga">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" id="stok" name="stok">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4"> <!-- Add mb-4 for spacing -->
                                            <div class="col-md-12">
                                                <label for="ket">Keterangan</label>
                                                <input type="text" class="form-control" id="ket" name="ket">
                                            </div>
                                        </div>

                                        <!-- Buttons centered -->
                                        <div class="d-flex justify-content-center mt-4"> <!-- Add margin-top for spacing -->
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="submit" class="btn mr-2" style="background-color: #ff851b; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>

                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Penjualan - Data Barang Penjualan</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="patient-visit-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th width="20%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($rad as $data)
                                            <tr>
                                                <td>{{ $data->no_rm }}</td>
                                            </tr>
                                        @endforeach --}}
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
            $("#patient-visit-table").DataTable({
>>>>>>> f6686325a1a92cce751e6c86aea644269e1986a6
                "responsive": true,
                "autoWidth": false,
                "buttons": false,
                "lengthChange": true, // Corrected: Removed conflicting lengthChange option
                "language": {
                    "lengthMenu": "Tampil  MENU",
                    "info": "Menampilkan START - END dari TOTAL entri",
                    "search": "Cari :",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Berikutnya"
                    }
                }
            });
        });
    </script>
@endsection
