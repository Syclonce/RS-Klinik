@extends('template.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="mt-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">{{ $menus }}</h3>
                            <div class="text-right card-tools">
                                <button id="singkrondata" type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Singkron
                                </button>
                            </div>
                        </div>

                          <!-- /.card-header -->
                          <div class="card-body" id="kunjungan-section">
                            <table id="tabelkodedatabpjs" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="30%">Nama Spesialis</th>
                                        <th class="text-center" width="30%">Kode SubSpesialis</th>
                                        <th class="text-center" width="40%">Nama SubSpesialis</th>                                        
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($spesialis as $data)
                                            <tr>
                                                <td class="text-center">{{ $data->spesialis->nama }}</td>
                                                <td class="text-center">{{ $data->kode }}</td>
                                                <td class="text-center">{{ $data->nama }}</td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
     $(document).ready(function() {
            $('#singkrondata').on('click', function(event) {
                event.preventDefault(); // Prevent the form from submitting via the browser
                // Ambil URL saat ini
                var pathname = window.location.pathname;
                
                // Asumsikan URL memiliki format /pcare/subspesialis/{kode}
                // Kita pecah path menjadi array dan ambil elemen terakhir (kode)
                var kode = pathname.split("/").pop();

                $.ajax({
                    url: '/pcare/subspesialis/get/' + kode,
                    type: 'GET',
                    success: function(response) {
                        if(response.status == "error")
                        {
                            alert('Data tidak di temukan');
                        }else{
                            alert('Data berhasil di singkron!');
                            location.reload(); // Reload the page
                        }

                    },
                    error: function(xhr) {
                        // Handle error response
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
</script>

    <script>
        $(document).ready(function() {
            $("#tabelkodedatabpjs").DataTable({
                "responsive": true,
                "autoWidth": false,
                "buttons": false,
                "lengthChange": true, // Corrected: Removed conflicting lengthChange option
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
        });
    </script>

@endsection
