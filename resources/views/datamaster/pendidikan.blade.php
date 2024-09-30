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
                                <h3 class="mb-0 card-title">Kelola Data Pendidikan Pegawai</h3>
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
                                  <th class="text-center">Tingkat</th>
                                  <th class="text-center">Indek</th>
                                  <th class="text-center">Gaji Pokok</th>
                                  <th class="text-center">Kenaikan</th>
                                  <th class="text-center">Maksimal</th>
                                  <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->tingkat }}</td>
                                                <td>{{ $data->index }}</td>
                                                <td>{{ $data->gapok }}</td>
                                                <td>{{ $data->kenaikan }}</td>
                                                <td>{{ $data->maks }}</td>
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
                    <h5 class="modal-title" id="addModalLabel">Kelola Data Pendidikan Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.pendidikan.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Tingkat </label>
                                    <input type="text" class="form-control" id="tingkat" name="tingkat">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Indek </label>
                                    <input type="number" class="form-control" id="index" name="index">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Gaji Pokok </label>
                                    <input type="number" class="form-control" id="gapok" name="gapok">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kenaikan </label>
                                    <input type="number" class="form-control" id="kenaikan" name="kenaikan">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Maksimal </label>
                                    <input type="number" class="form-control" id="maks" name="maks">
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
