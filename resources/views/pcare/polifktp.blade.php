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
                            <h3 class="mb-0 card-title">Refrensi Poli FKTP</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="tabelkodedata" class="table table-bordered table-striped">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center" width="50%">Kode Poli</th>
                                        <th class="text-center" width="50%">Nama Poli</th>                                       
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($kopol as $data)
                                            <tr>
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
            $("#tabelkodedata").DataTable({
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
