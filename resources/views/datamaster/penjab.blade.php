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
                                <h3 class="mb-0 card-title">Kelola Data Penanggung Jawab</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="janjitbl" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">Kode </th>
                                  <th class="text-center">Nama </th>
                                  <th class="text-center">Perusahaan </th>
                                  <th class="text-center">Alamat </th>
                                  <th class="text-center">No Telepon </th>
                                  <th class="text-center">Attn </th>
                                  <th class="text-center">Status </th>
                                  <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->kode }}</td>
                                                <td>{{ $data->pj }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>{{ $data->telp }}</td>
                                                <td>{{ $data->attn }}</td>
                                                <td>{{ $data->status }}</td>
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
                    <h5 class="modal-title" id="addModalLabel">Kelola Data Penanggung Jawab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.penjab.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kode </label>
                                    <input type="text" class="form-control" id="kode_penjab" name="kode_penjab">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Penanggung Jawab </label>
                                    <input type="text" class="form-control" id="nama_penjab" name="nama_penjab">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Perusahaan </label>
                                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Alamat Asuransi </label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>No. Telepon </label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Attn </label>
                                    <input type="text" class="form-control" id="attn" name="attn">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                                        <option value="">--- pilih ---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
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
            // Summernote
            $('#template').summernote()

            $("#janjitbl").DataTable({
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
