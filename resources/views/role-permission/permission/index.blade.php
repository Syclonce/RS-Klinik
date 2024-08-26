@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Nama Pejabat</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addpermesionModal">
                                        <i class="fas fa-plus"></i> Add Permesion
                                    </button>
                                    {{-- <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('roless') }}'">
                                        <i class="fas fa-plus"></i> Pemesion
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('roless') }}'">
                                        <i class="fas fa-plus"></i> User
                                    </button> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('id');
                                @endphp
                                <table id="permissiontbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 1; @endphp
                                        @foreach ($permissions as $permission)
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


    <div class="modal fade" id="addpermesionModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Permission</h5>
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
                    <button type="submit" class="btn btn-primary">Perbarui</button> <!-- Submit button -->
                </div>
                </form>
            </div>
        </div>
    </div>




    <div class="modal fade" id="editpermesionModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editFormpermesion" action="{{ route('permissions.update') }}" method="POST">
                        @csrf
                        <input type="hidden" id="permissionsid" name="permissionsid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pejabat</label>
                                    <input type="text" class="form-control" id="permissionnames" name="permissionnames">
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button> <!-- Submit button -->
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="deletepermesionModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteFormpermesion" action="{{ route('permissions.destroy') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Hapus Data permesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="permissionsids" name="permissionsids">
                        <div id="deleteTextpermissions"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

@endsection
