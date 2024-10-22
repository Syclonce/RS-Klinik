@extends('template.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="mt-3 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Refrensi ICD 10 (BPJS)</h3>
                            <div class="text-right card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#bpjs">
                                    <i class="fas fa-plus"></i> Singkron
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="tabelkodedatabpjs" class="table table-bordered table-striped">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center" width="50%">Kode ICD 10</th>
                                        <th class="text-center" width="50%">Nama ICD 10</th>                                       
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($icd10_bpjs as $data)
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
                <div class="mt-3 col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Refrensi ICD 10 (Satu Sehat)</h3>
                            <div class="text-right card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#ss">
                                    <i class="fas fa-plus"></i> Singkron
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="tabelkodedatass" class="table table-bordered table-striped">
                                <thead>
                                    <tr>                                        
                                        <th class="text-center" width="50%">Kode ICD 10</th>
                                        <th class="text-center" width="50%">Nama ICD 10</th>                                       
                                    </tr>
                                </thead>
                                <tbody >
                                    {{-- @foreach ($icd10_bpjs as $data)
                                            <tr>
                                                <td class="text-center">{{ $data->kode }}</td>
                                                <td class="text-center">{{ $data->nama }}</td>                                                                                                
                                            </tr>
                                        @endforeach --}}
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

<div class="modal fade" id="bpjs" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Singkron Data BPJS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="singkrondata">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama ICD 10 </label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Singkro</button> <!-- Submit button -->
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ss" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Singkron Data Satu Sehat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="singkrondata">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama ICD 10 </label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Singkro</button> <!-- Submit button -->
            </div>
            </form>
        </div>
    </div>
</div>

<script>
     $(document).ready(function() {
            $('#singkrondata').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting via the browser

                var nama = $('#nama').val();

                $.ajax({
                    url: '/pcare/icd10/get/' + nama, 
                    type: 'GET',                    
                    success: function(response) {
                        if(response.status == "error")
                        {
                            alert('Data tidak di temukan');                            
                        }else{
                            alert('Data berhasil di singkron!');
                            location.reload(); // Reload the page
                            $('#adddoctor').modal('hide'); // Hide the modal
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

    <script>
        $(document).ready(function() {
            $("#tabelkodedatass").DataTable({
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
