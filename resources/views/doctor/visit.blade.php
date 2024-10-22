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
                                <h3 class="mb-0 card-title">Tarif Kunjungan Dokter</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="visittbl" class="table table-bordered table-striped dataTable">
                                    <thead>
                                        <tr>
                                            <th>Dokter</th>
                                            <th>Mengunjungi Deskripsi</th>
                                            <th>Mengunjungi Biaya</th>
                                            <th>Status</th>
                                            <th width="40%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 1; @endphp
                                        @foreach ($visit as $visit)
                                            <tr>
                                                <td>{{ $visit->doctor->nama }}</td>
                                                <td>{{ $visit->deskripsi }}</td>
                                                <td>{{ $visit->harga }}</td>
                                                <td>{{ $visit->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal"
                                                    data-target="#editpermesionModal"

                                                    class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>

                                                    <a href="#" data-toggle="modal"
                                                    data-target="#deletepermesionModal"

                                                        class="delete-data-permesion">
                                                        <i class="fa fa-trash-can text-secondary"></i></a>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Tarif Kunjungan Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('doctor.visit.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>doctor</label>
                                  <select class="form-control select2bs4" style="width: 100%;" id="doctors" name="doctors">
                                    @foreach ($doctors as $doctors)
                                    <option value="{{$doctors->id}}">{{$doctors->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Harga </label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status">
                                      <option value="1">Aktif</option>
                                      <option value="0">Tidak Aktif</option>
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
            $("#visittbl").DataTable({
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
