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
                                <h3 class="mb-0 card-title">Jadwal Waktu</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="scheduletbl" class="table table-bordered table-striped">
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
                                    @foreach ($schedule as $schedule)
                                            <tr>
                                                <td class="text-center">{{ $schedule->doctor->nama}}</td>
                                                <td class="text-center">{{ $schedule->hari}}</td>
                                                <td class="text-center"><?= date("g:i A", strtotime( $schedule->awal)); ?></td>
                                                <td class="text-center"><?= date("g:i A", strtotime( $schedule->akhir)); ?></td>
                                                <td class="text-center">{{ $schedule->menit}} Menit</td>
                                                <td class="text-center"></td>
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
                    <h5 class="modal-title" id="addModalLabel">Menambahkan Susunan acara</h5>
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
                                  <label>Dokter</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="dokter" name="dokter">
                                    @foreach ($data as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Hari</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="hari" name="hari">
                                    <option value="1">Senin</option>
                                    <option value="2">Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4">Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6">Sabtu</option>
                                    <option value="7">Minggu</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                      <label>Waktu Mulai</label>

                                      <div class="input-group date" id="awalacara" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#awalacara" data-toggle="datetimepicker" id="awal" name="awal"/>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                      <label>Akhir Waktu</label>

                                      <div class="input-group date" id="akhiracara" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#akhiracara" data-toggle="datetimepicker" id="akhir" name="akhir"/>
                                        </div>
                                    </div>
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
            $("#scheduletbl").DataTable({
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
