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
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $rolename)
                                                            <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('user.role-premesions',['user' => $user->id]) }}"><i class="fa fa-edit text-secondary"></i></a>
                                                    <a href="{{ route('user.role-premesion.del',['user' => $user->id]) }}"><i class="fa fa-edit text-secondary"></i></a>

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

@endsection

