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
                                {{-- <div class="card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addroleModal">
                                        <i class="fas fa-plus"></i> Add role
                                    </button>
                                </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('user.role-premesion.edit',['user' => $user->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" readonly value="{{ $user->name }}" class="form-control" />
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Roles</label>
                                        <select name="roles[]" class="form-control" multiple>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option
                                                value="{{ $role }}"
                                                {{ in_array($role, $userRoles) ? 'selected':'' }}
                                            >
                                                {{ $role }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
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

@endsection

