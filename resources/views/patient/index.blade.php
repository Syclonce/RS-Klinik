@extends('doctor.app')

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
                                <h3 class="card-title mb-0">Pasien</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="permissiontbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Nama Dokter</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pasien as $pasien)
                                            <tr>
                                                <td>{{ $pasien->nama }}</td>
                                                <td>{{ $pasien->telepon }}</td>
                                                <td>{{ $pasien->Alamat }}</td>
                                                <td>{{ $pasien->user->email }}</td>
                                                <td>{{ $pasien->tgl }}</td>
                                                <td>{{ $pasien->seks }}</td>
                                                <td>{{ $pasien->goldar->nama }}</td>
                                                <td>{{ $pasien->doctor->nama }}</td>
                                                <td></td>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('patient.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username </label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="Email" class="form-control" id="email" name="email">
                                </div>
                            </div>
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
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl" name="tgl">
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telepon  </label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Nama Dokter</label>
                                  <select class="form-control select2bs4"  style="width: 100%;"  id="dokter" name="dokter">
                                    @foreach ($docter as $docter)
                                    <option value="{{$docter->id}}">{{$docter->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Seks </label>
                                    <select class="form-control select2bs4"  style="width: 100%;"  id="seks" name="seks">
                                        @foreach ($seks as $seks)
                                        <option value="{{$seks->kode}}">{{$seks->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Golongan Darah </label>
                                    <select class="form-control select2bs4"  style="width: 100%;"  id="goldar" name="goldar">
                                        @foreach ($goldar as $goldar)
                                        <option value="{{$goldar->id}}">{{$goldar->nama}}</option>
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

@endsection
