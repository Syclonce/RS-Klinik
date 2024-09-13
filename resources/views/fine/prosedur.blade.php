@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="mt-3 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Prosedur Pembayaran</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                        {{-- <form action="{{ route('finance.add') }}" method="POST"> --}}
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctortbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pembayaran Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori Harga (Rp)</th>
                                            <th>Komisi Dokter</th>
                                            <th>Tipe</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prosedur as $prosedur)
                                            <tr>
                                                <td>{{ $prosedur->kode }}</td>
                                                <td>{{ $prosedur->pembayaran }}</td>
                                                <td>{{ $prosedur->deskripsi}}</td>
                                                <td>{{ $prosedur->harga}}</td>
                                                <td>{{ $prosedur->komisi}}%</td>
                                                <td>{{ $prosedur->tipepemeriksa->nama}}</td>
                                            </tr>
                                        @endforeach
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



    <div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel"> Buat Prosedur Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('finance.prosedur.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode*</label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Pembayaran Nama Barang</label>
                                    <input type="text" class="form-control" id="pembayaran" name="pembayaran">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Komisi Dokter Menilai (%) </label>
                                    <input type="number" class="form-control" id="komisi" name="komisi">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Tipe</label>
                                  <select class="select2bs4" style="width: 100%;"  id="tipepemeriksa_id" name="tipepemeriksa_id">
                                    @foreach ($data as $tipe)
                                    <option value="{{$tipe->id}}">{{$tipe->nama}}</option>
                                    @endforeach
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
    </div>

    <script>
        $(document).ready(function() {
            $("#doctortbl").DataTable({
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
