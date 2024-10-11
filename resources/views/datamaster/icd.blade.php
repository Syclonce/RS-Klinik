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
                                <div class="row">
                                    <!-- Tabel 1 -->
                                    <div class="col-md-6">
                                        <h3 class="mb-0 card-title">ICD 9</h3>
                                        <div class="text-right card-tools">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#icd9add">
                                                <i class="fas fa-plus"></i> Tambah Baru
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-0 card-title">ICD 10</h3>
                                        <div class="text-right card-tools">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#icd10add">
                                                <i class="fas fa-plus"></i> Tambah Baru
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Tabel 1 -->
                                    <div class="col-md-6">
                                        <table id="icd9" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Kode</th>
                                                    <th class="text-center">Nama Prosedur</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($icd9 as $icd9)
                                                    <tr>
                                                        <td>{{ $icd9->kode }}</td>
                                                        <td>{{ $icd9->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Tabel 2 -->
                                    <div class="col-md-6">
                                        <table id="icd10" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Kode</th>
                                                    <th class="text-center">Nama Prosedur</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($icd10 as $icd10)
                                                    <tr>
                                                        <td>{{ $icd10->kode }}</td>
                                                        <td>{{ $icd10->nama }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

    <div class="modal fade" id="icd9add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">ICD 9</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.icd.9add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kode </label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama</label>
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

    <div class="modal fade" id="icd10add" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">ICD 10</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.icd.10add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama</label>
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
            // Summernote
            $('#template').summernote()

            $("#icd9").DataTable({
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

            $("#icd10").DataTable({
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
