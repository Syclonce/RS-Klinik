@extends('doctor.app')

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
                                <h3 class="mb-0 card-title">Dokter</h3>
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
                                            <th>ID Faktur</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>Tanggal</th>
                                            <th>Dari</th>
                                            <th>Sub Total</th>
                                            <th>Diskon</th>
                                            <th>Total Keseluruhan</th>
                                            <th>Dibayar Jumlah</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Catatan</th>
                                            <th>Pilihan</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->nama }}</td>
                                                <td>{{ $doctor->Alamat }}</td>
                                                <td>{{ implode(', ', json_decode($doctor->spesialis)) }}</td>
                                                <td>{{ $doctor->telepon }}</td>
                                                <td>{{ $doctor->user->email }}</td>
                                                <td><a href="{{ route('doctor.doctor', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>
                                                <td><a href="{{ route('doctor.doctor.liburan', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>
                                                </td>
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



<div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambahkan Pembayaran Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('doctor.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pasien </label>
                                    <select class="form-control select2bs4"  style="width: 100%;"  id="seks" name="seks">
                                        {{-- @foreach ($seks as $seks)
                                        <option value="{{$seks->kode}}">{{$seks->nama}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            {{-- <div class="card-body">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group">
                                      <label>Multiple</label>
                                      <select class="duallistbox" multiple="multiple">
                                        <option selected>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                      </select>
                                    </div>
                                    <!-- /.form-group -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" class="form-control" id="password" name="password" autocomplete >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat </label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Spesialis</label>
                                  <select class="select2bs4" multiple="multiple"  style="width: 100%;"  id="spesialis" name="spesialis[]">
                                    {{-- @foreach ($data as $spesiali)
                                    <option value="{{$spesiali->kode}}">{{$spesiali->nama}}</option>
                                    @endforeach --}}
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Telepon  </label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Harga </label>
                                    <input type="text" class="form-control" id="harga" name="harga">
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
