@extends('doctor.app')

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
                                <h3 class="card-title mb-0">Janji - Konfirmasi Tertunda</h3>
                                <div class="card-tools text-right">
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
                                  <th class="text-center">Dokter</th>
                                  <th class="text-center">Hari Kerja</th>
                                  <th class="text-center">Waktu Mulai</th>
                                  <th class="text-center">Akhir Waktu</th>
                                  <th class="text-center">Durasi</th>
                                  <th class="text-center">Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>

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
                    <form id="addFormpermesion" action="{{ route('schedule.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Pasien</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="pasien" name="pasien">
                                    @foreach ($data_pasien as $pasien)
                                    <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Dokter</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="dokter" name="dokter">
                                    @foreach ($data_dokter as $dokter)
                                    <option value="{{$dokter->id}}">{{$dokter->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
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
                                  <label>Available Slots</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="slot" name="slot">
                                    <option value="bingung">Bingung isinya</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Janji Status</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="status" name="status">
                                    <option value="tunda">Konfirmasi Tertunda</option>
                                    <option value="konfirm">Dikonfirmasi</option>
                                    <option value="obati">Diobati</option>
                                    <option value="batal">Dibatalkan</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Catatan </label>
                                    <input type="text" class="form-control" id="catatan" name="catatan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Mengunjungi Deskripsi</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="deskripsi" name="deskripsi">
                                    <option value="bingung">Bingung isinya</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Menit</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="menit" name="menit">
                                        <?php
                                        for ($i = 0; $i <= 60; $i += 5) {
                                            // Format angka menjadi dua digit
                                            $minute = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            echo "<option value=\"$i\">$minute Minutes </option>";
                                        }
                                        ?>
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
