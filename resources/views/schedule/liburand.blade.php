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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Jadwal Waktu</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="liburandtbl" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">Dokter</th>
                                  <th class="text-center">Tanggal Liburan</th>
                                  <th class="text-center">Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($liburan as $liburan)
                                            <tr>
                                                <td class="text-center">{{ $liburan->doctor->nama}}</td>
                                                <td class="text-center">{{ $liburan->liburan}}</td>
                                                <td class="text-center"></td>
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
                    <h5 class="modal-title" id="addModalLabel">Menambahkan Susunan acara</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('doctor.doctor.liburan.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" class="form-control" id="dokter" name="dokter" value="{{ $dataid }}">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                      <div class="input-group date" id="tglliburan" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#tglliburan" data-toggle="datetimepicker" id="liburan" name="liburan"/>
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
            $("#liburandtbl").DataTable({
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
