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
                                <h3 class="card-title mb-0">Dokter</h3>
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
                                            <th>Nama</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->nama }}</td>

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
                    <h5 class="modal-title" id="addModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('finance.daig.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pemeriksa</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
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
