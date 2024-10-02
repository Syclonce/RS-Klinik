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
                                <h3 class="mb-0 card-title">Kelola Jenis Perawatan Rawat Inap</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="janjitbl" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">Kode Perawatan </th>
                                  <th class="text-center">Nama Perawatan </th>
                                  <th class="text-center">Tarif Dokter</th>
                                  <th class="text-center">Tarif Perawat </th>
                                  <th class="text-center">Total Tarif </th>
                                  <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->kode }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->tarifdok }}</td>
                                                <td>{{ $data->tarifper }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td></td>
                                            </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Kelola Jenis Perawatan Inap</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.pernap.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Rawai Inap</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kode_pernap" name="kode_pernap" placeholder="Generate Kode Barang" readonly>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" id="generateKodeButton">Generate</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama </label>
                                    <input type="text" class="form-control" id="nama_pernap" name="nama_pernap">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kategori </label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kategori" name="kategori">
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        @foreach ($katper as $data)
                                        <option value="{{$data->id}}">{{$data->nama_rawatan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tarif Dokter </label>
                                    <input type="number" class="form-control" id="tarif_dokter" name="tarif_dokter">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tarif Perawat </label>
                                    <input type="number" class="form-control" id="tarif_perawat" name="tarif_perawat">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Total Tarif </label>
                                    <input type="number" class="form-control" id="total_tarif" name="total_tarif">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="penjab" name="penjab">
                                        <<option value="" disabled selected>-- Pilih Penjab --</option>
                                        @foreach ($penjab as $data)
                                        <option value="{{$data->id}}">{{$data->pj}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Bangsal</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="bangsal" name="bangsal">
                                        <option value="" disabled selected>-- Pilih Poli --</option>
                                        @foreach ($bangsal as $data)
                                        <option value="{{$data->id}}">{{$data->nama_bangsal}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kelas </label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kelas" name="kelas">
                                        <option value="">--- pilih ---</option>
                                        @foreach ($kelas as $kelas)
                                        <option value="{{$kelas->id}}">{{$kelas->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                                        <option value="">--- pilih ---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
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
            // Ketika tombol "Generate" diklik
            $('#generateKodeButton').click(function() {
                // Panggil route Laravel menggunakan AJAX
                $.ajax({
                    url: '/generate-kode-pernap', // Route untuk generate kode
                    type: 'GET',
                    success: function(response) {
                        // Tampilkan kode yang dihasilkan di input field
                        $('#kode_pernap').val(response.kode_pernap);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // Handle error
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung total tarif saat tarif dokter atau perawat berubah
            function hitungTotalTarif() {
                // Ambil nilai dari input tarif dokter dan perawat
                var tarifDokter = parseFloat($('#tarif_dokter').val()) || 0;
                var tarifPerawat = parseFloat($('#tarif_perawat').val()) || 0;

                // Hitung total tarif
                var totalTarif = tarifDokter + tarifPerawat;

                // Tampilkan hasil pada input total_tarif
                $('#total_tarif').val(totalTarif);
            }

            // Trigger fungsi hitungTotalTarif setiap kali input berubah
            $('#tarif_dokter, #tarif_perawat').on('input', function() {
                hitungTotalTarif();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Summernote
            $('#template').summernote()

            $("#janjitbl").DataTable({
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
