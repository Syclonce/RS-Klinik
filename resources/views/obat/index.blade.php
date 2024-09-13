@extends('template.app')

@section('content')
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
                                <h3 class="card-title mb-0">Obat</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctortbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Kotak Toko</th>
                                            <th>Harga Pembelian</th>
                                            <th>Harga Penjualan</th>
                                            <th>Kuantitas</th>
                                            <th>Nama Generik</th>
                                            <th>Perusahaan</th>
                                            <th>Efek</th>
                                            <th>Tanggal Kadaluarsa</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->id}}</td>
                                                <td>{{ $data->nama}}</td>
                                                <td>{{ $data->obatk->nama}}</td>
                                                <td>{{ $data->kota}}</td>
                                                <td>{{ $data->pembelian}}</td>
                                                <td>{{ $data->penjualan}}</td>
                                                <td>{{ $data->kuantitas}}</td>
                                                <td>{{ $data->generik}}</td>
                                                <td>{{ $data->perusahaan}}</td>
                                                <td>{{ $data->efek}}</td>
                                                <td>{{ $data->tanggal}}</td>
                                                </td>
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
                    <h5 class="modal-title" id="addModalLabel">Tambahkan Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('obat.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control select2bs4"  style="width: 100%;"  id="obatk_id" name="obatk_id">
                                        @foreach ($kategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Harga Pembelian </label>
                                    <input type="text" class="form-control" id="pembelian" name="pembelian">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Harga Penjualan</label>
                                    <input type="text" class="form-control" id="penjualan" name="penjualan">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kuantitas</label>
                                    <input type="number" class="form-control" id="kuantitas" name="kuantitas">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Nama Generik</label>
                                  <input type="text" class="form-control" id="generik" name="generik">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Perusahaan</label>
                                    <input type="text" class="form-control" id="perusahaan" name="perusahaan">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Efek</label>
                                    <input type="text" class="form-control" id="efek" name="efek">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kota Toko</label>
                                    <input type="text" class="form-control" id="kota" name="kota">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Kadaluarsa</label>
                                      <div class="input-group date" id="tgljanji" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#tgljanji" data-toggle="datetimepicker" id="tanggal" name="tanggal"/>
                                      </div>
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
