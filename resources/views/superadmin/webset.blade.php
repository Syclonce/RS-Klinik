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
                {{-- <!-- Main row -->
                <div class="row">

                    <!-- /.col -->
                </div> --}}

                <div class="row">
                    <!-- Kolom kiri (Profile Image) -->
                    <div class="col-md-3">
                        <style>
                            .profile-user-img {
                                width: 100px; /* Ukuran lebar gambar, ubah sesuai kebutuhan */
                                height: 100px; /* Ukuran tinggi gambar, ubah sesuai kebutuhan */
                                border-radius: 50%; /* Membuat gambar berbentuk bulat */
                                border: 2px solid #ddd; /* Menambahkan border pada gambar */
                            }
                        </style>
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                @foreach ($webset as $webset)
                                <div class="text-center">
                                    <img class="profile-user-img img-circle"
                                        src="{{ asset('webset/' . $webset->logo_app) }}" alt="User profile picture">
                                </div>


                                <br>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item text-center">
                                        <b>Name web : </b> <a class="float">{{ $webset->name_app }}</a>
                                    </li>
                                </ul>
                                <br>
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- Kolom kanan (Form untuk mengupdate Name App dan Logo) -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">
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
                                                <input type="file" name="logo_app" class="custom-file-input" id="logoApp">
                                                <label class="custom-file-label" for="logoApp">{{ $webset->logo_app }}</label>
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

                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <form action="{{ route('setweb.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @foreach ($setsatusehat as $setsatusehat)
                                    <div class="form-group">
                                        <label for="nameApp">org_id</label>
                                        <input type="text" name="org_id" class="form-control" id="org_id" value="{{ $setsatusehat->org_id }}" placeholder="Enter app name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameApp">client_id</label>
                                        <input type="text" name="client_id" class="form-control" id="client_id" value="{{ $setsatusehat->client_id }}" placeholder="Enter app name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameApp">client_secret</label>
                                        <input type="text" name="client_secret" class="form-control" id="client_secret" value="{{ $setsatusehat->client_secret }}" placeholder="Enter app name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameApp">SATUSEHAT_BASE_URL</label>
                                        <input type="text" name="SATUSEHAT_BASE_URL" class="form-control" id="SATUSEHAT_BASE_URL" value="{{ $setsatusehat->SATUSEHAT_BASE_URL }}" placeholder="Enter app name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $setsatusehat->id }}">
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary card-outline">
                            <form action="{{ route('setweb.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_CONSID</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_SCREET_KEY</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_USERNAME</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_PASSWORD</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_APP_CODE</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_USER_KEY</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_BASE_URL</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nameApp">BPJS_PCARE_SERVICE_NAME</label>
                                                <input type="text" name="name_app" class="form-control" id="nameApp" placeholder="Enter app name" required>
                                            </div>
                                        </div>

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
                </div>

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
