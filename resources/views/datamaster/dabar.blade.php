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
                                <h3 class="mb-0 card-title">Kelola Data Barang</h3>
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
                                  <th class="text-center">Kode Barang</th>
                                  <th class="text-center">Nama Barang</th>
                                  <th class="text-center">Satuan</th>
                                  <th class="text-center">Letak Barang</th>
                                  <th class="text-center">Harga Dasar</th>
                                  <th class="text-center">Harga Beli</th>
                                  <th class="text-center">Stok Minimal</th>
                                  <th class="text-center">Jenis</th>
                                  <th class="text-center">Isi</th>
                                  <th class="text-center">Kapasitas</th>
                                  <th class="text-center">Expired</th>
                                  <th class="text-center">Status</th>
                                  <th class="text-center">Industri</th>
                                  <th class="text-center">Kategori</th>
                                  <th class="text-center">Golongan</th>
                                  <th class="text-center">Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->kode}}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->sat->nama_satuan}}</td>
                                                <td>{{ $data->letak}}</td>
                                                <td>{{ $data->harga_dasar}}</td>
                                                <td>{{ $data->harga_beli}}</td>
                                                <td>{{ $data->stok}}</td>
                                                <td>{{ $data->jenbar->nama_jenbar}}</td>
                                                <td>{{ $data->isi}}</td>
                                                <td>{{ $data->kapasitas}}</td>
                                                <td>{{ $data->expired}}</td>
                                                <td>{{ $data->status}}</td>
                                                <td>{{ $data->industri->nama_industri}}</td>
                                                <td>{{ $data->katbar->nama_barang}}</td>
                                                <td>{{ $data->golbar->nama_golbar}}</td>
                                                <td></td>

                                            </tr>
                                    @endforeach
                                </tbody>
                                {{-- @php
                                    dd($data);
                                @endphp --}}
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
                    <h5 class="modal-title" id="addModalLabel">Kelola Data Bangsal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('datmas.dabar.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Generate Kode Barang">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary" onclick="generateNomorRM()">Generate</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Expired</label>
                                    <input type="date" class="form-control" id="expired" name="expired">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Status </label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                                        <option value="">--- pilih ---</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kode Satuan Besar</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_satbes" name="kode_satbes">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                        @foreach ($satuan as $data)
                                        <option value="{{$data->id}}">{{$data->nama_satuan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Kode Satuan</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_sat" name="kode_sat">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                            @foreach ($satuan as $data)
                                            <option value="{{$data->id}}">{{$data->nama_satuan}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Harga Dasar</label>
                                    <input type="number" class="form-control" id="harga_dasar" name="harga_dasar">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Stok Minimal</label>
                                    <input type="text" class="form-control" id="stok" name="stok">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kapasitas</label>
                                    <input type="text" class="form-control" id="kapasitas" name="kapasitas">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Isi</label>
                                    <input type="text" class="form-control" id="isi" name="isi">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Letak Barang</label>
                                    <input type="text" class="form-control" id="letak" name="letak">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kode Jenis</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_jenis" name="kode_jenis">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                            @foreach ($jenis as $data)
                                            <option value="{{$data->id}}">{{$data->nama_jenbar}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kode Industri</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_industri" name="kode_industri">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                            @foreach ($industri as $data)
                                            <option value="{{$data->id}}">{{$data->nama_industri}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kode Kategori</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_kategori" name="kode_kategori">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                            @foreach ($katbar as $data)
                                            <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Kode Golongan</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="kode_golongan" name="kode_golongan">
                                        <option value="" disabled selected>-- Pilih Kode --</option>
                                            @foreach ($golbar as $data)
                                            <option value="{{$data->id}}">{{$data->nama_golbar}}</option>
                                            @endforeach
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
        $(document).ready(function(){
            // Ketika user mengetikkan angka di input Harga Dasar
            $('#harga_dasar').on('input', function() {
                var hargaDasar = $(this).val(); // Mengambil nilai dari input Harga Dasar

                // Mengisi input Harga Beli dengan nilai yang sama
                $('#harga_beli').val(hargaDasar);
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
