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
                                <h3 class="card-title">Role : {{ $role->name }}</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addroleModal">
                                        <i class="fas fa-plus"></i> Add role
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('role.give.put', ['roleId' => $role->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="">Permissions</label>

                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                            <div class="col-md-2">
                                                <label>
                                                    <input
                                                        type="checkbox"
                                                        name="permission[]"
                                                        value="{{ $permission->name }}"
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                    />
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
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
                        <input  id="roleid" name="roleid">
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
