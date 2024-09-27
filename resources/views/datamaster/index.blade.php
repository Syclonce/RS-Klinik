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
                                <h3 class="mb-0 card-title">Laporan Lab</h3>
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
                                  <th class="text-center">ID Laporan</th>
                                  <th class="text-center">Pasien</th>
                                  <th class="text-center">Tanggal</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lap as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->pasien->nama }}</td>
                                                <td>{{ $data->tanggal }}</td>
                                                <td>{{ $data->status }}</td>
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
                    <h5 class="modal-title" id="addModalLabel">Tambahkan Janji</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('laporan.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                      <div class="input-group date" id="tgljanji" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#tgljanji" data-toggle="datetimepicker" id="tanggal" name="tanggal"/>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Pasien</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="pasien" name="pasien">
                                    <option value="">Pilih Pasien</option>
                                        @foreach ($pasien as $pasien)
                                        <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                        @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dokter</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="dokter" name="dokter">
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($doctor as $dokter)
                                        <option value="{{$dokter->id}}">{{$dokter->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Template</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="template" name="template">
                                        <option value="">Pilih Template</option>
                                        @foreach ($template as $item) <!-- Perhatikan variabel $item -->
                                        <option value={{ $item->id }}>{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Laporan</label>
                                    <input type="text" class="form-control" id="laporan" name="laporan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Status</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="status" name="status">
                                    <option value="kumpulkan">Sampel Dikumpulkan</option>
                                    <option value="lengkap">Lengkap</option>
                                    <option value="kirim">Terkirim</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="cleanText">Tambah</button> <!-- Submit button -->
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
                $('#template').on('change', function() {
                var templateId = $(this).val(); // Ambil ID template yang dipilih

                if (templateId) { // Jika template dipilih
                    $.ajax({
                        url: '/get-template-by-id/' + templateId, // Menggunakan ID di URL
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log("Received data:", response);

                            if (response.success) {
                                // Isi form laporan dengan nilai dari template yang diambil dari database
                                $('#laporan').val(response.template);
                            } else {
                                // Jika template tidak ditemukan, kosongkan kolom laporan
                                $('#laporan').val('');
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Terjadi kesalahan saat mengambil data template.');
                        }
                    });
                } else {
                    // Jika tidak ada template yang dipilih, kosongkan kolom laporan
                    $('#laporan').val('');
                }
            });

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
