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
                                <table id="permissiontbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>email</th>
                                            <th>Telepon</th>
                                            <th>profile</th>
                                            <th width="40%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 1; @endphp
                                        {{-- @foreach ($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal"
                                                    data-target="#editpermesionModal"
                                                    data-id="{{ $permission->id }}"
                                                    data-nama-permission="{{ $permission->name }}"
                                                    class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>

                                                    <a href="#" data-toggle="modal"
                                                    data-target="#deletepermesionModal"
                                                        data-id="{{ $permission->id }}"
                                                        data-nama-permission="{{ $permission->name }}"
                                                        class="delete-data-permesion">
                                                        <i class="fa fa-trash-can text-secondary"></i></a>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Permission</label>
                                    <input type="text" class="form-control" id="permissionname" name="permissionname">
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
