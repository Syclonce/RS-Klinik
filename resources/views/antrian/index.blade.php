@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Antrian Loket</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <!-- Tombol Konter -->
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-success mx-2 button" style="width: 100px; height: 100px;"
                                                data-toggle="modal" data-target="#adddoctor">
                                                A
                                                <span class="d-block small-text">KONTER</span>
                                            </button>
                                            <button class="btn btn-success mx-2 button" style="width: 100px; height: 100px;"
                                                data-toggle="modal" data-target="#adddoctor">
                                                B
                                                <span class="d-block small-text">KONTER</span>
                                            </button>
                                            <button class="btn btn-success mx-2 button" style="width: 100px; height: 100px;"
                                                data-toggle="modal" data-target="#adddoctor">
                                                F
                                                <span class="d-block small-text">KONTER</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- Tabel Waktu -->
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Hari</th>
                                                    <th>Tanggal</th>
                                                    <th>Waktu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="day"></td>
                                                    <td id="date"></td>
                                                    <td id="time"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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

        <!-- Running Text Display -->
        <div class="running-text">
            <marquee behavior="scroll" direction="left">
                ANTRIAN LOKET ANJAY MABAR
            </marquee>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Pemanggil Antrian Loket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Card di dalam modal -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Antrian Loket</h5>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#doctortbl").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": false,
                "lengthChange": true,
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

            // Fungsi untuk menampilkan hari, tanggal, dan waktu saat ini
            function updateTime() {
                const now = new Date();
                const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                const day = days[now.getDay()];
                const date = now.getDate();
                const month = now.getMonth() + 1;
                const year = now.getFullYear();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');

                // Update tabel dengan data terbaru
                document.getElementById('day').innerText = day;
                document.getElementById('date').innerText = `${date}/${month}/${year}`;
                document.getElementById('time').innerText = `${hours}:${minutes}:${seconds}`;
            }

            // Memperbarui waktu setiap detik
            setInterval(updateTime, 1000);
            updateTime();
        });
    </script>

    <style>
        .running-text {
            background-color: #ffffff;
            padding: 10px;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        /* Dark mode styles for running text */
        .dark-mode .running-text {
            background-color: #333;
            color: #fff;
        }
    </style>
@endsection
