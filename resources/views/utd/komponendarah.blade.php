@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row ">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Komponen Darah</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambahkan Data
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patient-visit-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama Komponen</th>
                                            <th>Lama</th>
                                            <th>Jasa Sarana</th>
                                            <th>Paket BHP</th>
                                            <th>KSO</th>
                                            <th>Manajemen</th>
                                            <th>Total</th>
                                            <th>Pembatalan</th>
                                            <th width="10%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($komda as $data)
                                            <tr>
                                                <td>{{ $data->kode }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->lama }}</td>
                                                <td>{{ $data->jasa }}</td>
                                                <td>{{ $data->bhp }}</td>
                                                <td>{{ $data->kso }}</td>
                                                <td>{{ $data->manajemen }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td>{{ $data->batal }}</td>
                                                <td></td>
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



    <div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Data Asset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('utd.komponendarah.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kode </label>
                                    <input type="text" class="form-control" id="kode" name="kode">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Komponen </label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lama </label>
                                    <input type="text" class="form-control" id="lama" name="lama">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jasa Sarana </label>
                                    <input type="number" class="form-control" id="jasa" name="jasa" oninput="calculateTotal()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Paket BHP </label>
                                    <input type="number" class="form-control" id="bhp" name="bhp" oninput="calculateTotal()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>KSO </label>
                                    <input type="number" class="form-control" id="kso" name="kso" oninput="calculateTotal()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Manajemen </label>
                                    <input type="number" class="form-control" id="manajemen" name="manajemen" oninput="calculateTotal()">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Total </label>
                                    <input type="number" class="form-control" id="total" name="total" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pembatalan </label>
                                    <input type="text" class="form-control" id="batal" name="batal">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button> <!-- Submit button -->
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#patient-visit-table").DataTable({
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
        function calculateTotal() {
            // Mendapatkan nilai dari setiap input
            var jasa = parseFloat(document.getElementById('jasa').value) || 0;
            var bhp = parseFloat(document.getElementById('bhp').value) || 0;
            var kso = parseFloat(document.getElementById('kso').value) || 0;
            var manajemen = parseFloat(document.getElementById('manajemen').value) || 0;

            // Menjumlahkan semua nilai
            var total = jasa + bhp + kso + manajemen;

            // Menampilkan hasil di kolom total
            document.getElementById('total').value = total;
        }
    </script>
@endsection
