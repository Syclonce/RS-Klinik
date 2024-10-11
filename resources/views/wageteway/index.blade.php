@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
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

                    <!-- Kolom kanan (Form untuk mengupdate Name App dan Logo) -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">

                                <div class="p-5 card d-flex flex-column align-items-center">
                                    <h1>Whatsapp Gateway</h1>
                                    <div class="gap-3 p-5 d-flex flex-column align-items-center">
                                        <img id="status-image" src="https://media.tenor.com/_62bXB8gnzoAAAAj/loading.gif" alt="QR Code"
                                            style="height: 200px;">
                                        <div id="qr-code"></div>
                                        <div>
                                            <div>Status: <span id="status_gatewaywa">Waiting connection from server</span></div>
                                        </div>
                                    </div>
                                    <button id="start-btn" class="btn btn-primary">Start Server</button>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">

                            </div>
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
