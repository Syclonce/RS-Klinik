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
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                @foreach ($webset as $webset)
                                    <br>
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('webset/' . $webset->logo_app) }}" alt="User profile picture">
                                    </div>
                                    <br>
                                    <br>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item text-center">
                                            <b>Name web : </b> <a class="float">{{ $webset->name_app }}</a>
                                        </li>
                                    </ul>
                            </div>
                            <!-- /.card-body -->
                            @endforeach
                        </div>
                        <!-- /.card -->
                    </div>


                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <form action="{{ route('setweb.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nameApp">Name APP</label>
                                        <input type="text" name="name_app" class="form-control" id="nameApp"
                                            value="{{ $webset->name_app }}" placeholder="Enter app name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="logoApp">File Logo APP</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="logo_app" class="custom-file-input"
                                                    id="logoApp">
                                                <label class="custom-file-label"
                                                    for="logoApp">{{ $webset->logo_app }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $webset->id }}">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <label for="toggleWarnings">Aktifkan peringatan pajak jatuh tempo</label>
                                <input type="checkbox" id="toggleWarnings">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <label for="toggleWarnings1">Aktifkan peringatan STNK jatuh tempo</label>
                                <input type="checkbox" id="toggleWarnings1">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <label>
                                    Set Reminder Time: <input type="time" id="reminderTime">
                                </label>
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleWarningsCheckbox = document.getElementById('toggleWarnings');
            var toggleWarningsCheckbox1 = document.getElementById('toggleWarnings1');
            var reminderTimeInput = document.getElementById('reminderTime');

            // Ambil status peringatan dari local storage
            var warningsEnabled = localStorage.getItem('warningsEnabled') === 'true';
            var warningsEnabled1 = localStorage.getItem('warningsEnabled1') === 'true';
            var reminderTime = localStorage.getItem('reminderTime') || '08:00';

            // Setel status checkbox sesuai dengan nilai yang disimpan di local storage
            toggleWarningsCheckbox.checked = warningsEnabled;
            toggleWarningsCheckbox1.checked = warningsEnabled1;
            reminderTimeInput.value = reminderTime;

            // Tambahkan event listener untuk menyimpan status ke local storage saat checkbox diubah
            toggleWarningsCheckbox.addEventListener('change', function() {
                localStorage.setItem('warningsEnabled', toggleWarningsCheckbox.checked);
            });
            toggleWarningsCheckbox1.addEventListener('change', function() {
                localStorage.setItem('warningsEnabled1', toggleWarningsCheckbox1.checked);
            });
            reminderTimeInput.addEventListener('change', function() {
                localStorage.setItem('reminderTime', reminderTimeInput.value);
            });
        });
    </script>
@endsection
