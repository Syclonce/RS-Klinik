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
                        <!-- Start Form -->
                        <form action="{{ route('penjualan.add') }}" method="POST" class="row w-100">
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
                                    @foreach ($datapjl as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->nama_barang }}</td>
                                                <td>{{ $data->harga }}</td>
                                                <td>{{ $data->stok }}</td>
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
            $("#patient-visit-table").DataTable({
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
@endsection
