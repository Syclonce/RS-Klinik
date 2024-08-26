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
                                        data-target="#addroleModal">
                                        <i class="fas fa-plus"></i> Add role
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('id');
                                @endphp
                                <table id="roletbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th width="40%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $index = 1; @endphp
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="modal"
                                                    data-target="#editroleModal"
                                                    data-id="{{ $role->id }}"
                                                    data-nama-role="{{ $role->name }}"
                                                    class="edit-data-role"><i class="fa fa-edit text-secondary"></i></a>
                                                    <a href="{{ route('role.give', ['roleId' => $role->id]) }}"
                                                        class="delete-data-role">
                                                        <i class="fa fa-trash-can text-secondary"></i></a>
                                                    <a href="#" data-toggle="modal"
                                                    data-target="#deleteroleModal"
                                                        data-id="{{ $role->id }}"
                                                        data-nama-role="{{ $role->name }}"
                                                        class="delete-data-role">
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


    <div class="modal fade" id="addroleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
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
                    <form id="addFormrole" action="{{ route('role.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Permission</label>
                                    <input type="text" class="form-control" id="rolename" name="rolename">
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




    <div class="modal fade" id="editroleModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
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
                    <form id="editFormrole" action="{{ route('role.update') }}" method="POST">
                        @csrf
                        <input type="hidden" id="roleid" name="roleid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Nama Pejabat</label>
                                    <input type="text" class="form-control" id="rolenames" name="rolenames">
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

    <div class="modal fade" id="deleteroleModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteFormrole" action="{{ route('role.destroy') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Hapus Data permesion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="roleids" name="roleids">
                        <div id="deleteTextrole"></div>
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
