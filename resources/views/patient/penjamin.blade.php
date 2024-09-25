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
                                <h3 class="card-title mb-0">Penjamin</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="sekstbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Jenis Penjamin</th>
                                            <th>Nama Penjamin</th>
                                            <th>Verifikasi Pasien</th>
                                            <th>Berlaku Mulai</th>
                                            <th>Berlaku Hingga</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->jenis}}</td>
                                                <td>{{ $data->nama}}</td>
                                                <td>{{ $data->verifikasi}}</td>
                                                <td>{{ $data->awal}}</td>
                                                <td>{{ $data->akhir}}</td>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Penjamin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('patient.penjamin.add') }}" method="POST">
                        @csrf
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-above-data-tab" data-toggle="pill" href="#custom-content-above-data" role="tab" aria-controls="custom-content-above-data" aria-selected="true">Pertama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-account-tab" data-toggle="pill" href="#custom-content-above-account" role="tab" aria-controls="custom-content-above-account" aria-selected="false">Kedua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-syarat-tab" data-toggle="pill" href="#custom-content-above-syarat" role="tab" aria-controls="custom-content-above-syarat" aria-selected="false">Ketiga</a>
                        </li>
                        </ul>
                        <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-above-data" role="tabpanel" aria-labelledby="custom-content-above-data-tab">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Jenis Penjamin </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="jenis" name="jenis">
                                            <option value="Asuransi">Asuransi</option>
                                            <option value="Perusahaan Swasta">Perusahaan Swasta</option>
                                            <option value="Perusahaan Pemerintah/BUMN/BUMD">Perusahaan Pemerintah/BUMN/BUMD</option>
                                            <option value="Institusi Pemerintah">Institusi Pemerintah</option>
                                            <option value="yayasan sosial">Yayasan Sosial</option>
                                            <option value="lain lain">Lain-Lain </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Nomor Penjamin </label>
                                        <input type="text" class="form-control" id="nomor_penjamin" name="nomor_penjamin">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Nama Penjamin </label>
                                        <input type="text" class="form-control" id="nama_penjamin" name="nama_penjamin">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Verifikasi Pasien</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="verifikasi" name="verifikasi">
                                            <option value="bebas un-managed">Bebas (UN-Managed)</option>
                                            <option value="prosedural managed">Prosedural (Managed)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Filter Obat Ditanggung</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="filter" name="filter">
                                            <option value="tidak_aktif">Tidak Aktif</option>
                                            <option value="aktif">Aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Berlaku Mulai :</label>
                                        <div class="input-group date" id="penjamin_awal" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#penjamin_awal" data-toggle="datetimepicker" id="tgl_awal" name="tgl_awal"/>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Berlaku Hingga :</label>
                                        <div class="input-group date" id="penjamin_akhir" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#penjamin_akhir" data-toggle="datetimepicker" id="tgl_akhir" name="tgl_akhir"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Alamat Penjamin </label>
                                        <input type="text" class="form-control" id="Alamat" name="Alamat">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Telepon </label>
                                        <input type="text" class="form-control" id="telepon" name="telepon">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Faksimil </label>
                                        <input type="text" class="form-control" id="fakes" name="fakes">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Contact Person </label>
                                        <input type="text" class="form-control" id="cp" name="cp">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Telpon Contact Person</label>
                                        <input type="text" class="form-control" id="telp_cp" name="telp_cp">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>HP Contact Person </label>
                                        <input type="text" class="form-control" id="hp_cp" name="hp_cp">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Jabatan CP</label>
                                        <input type="text" class="form-control" id="jabatan_cp" name="jabatan_cp">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Account Bank</label>
                                        <input type="text" class="form-control" id="akun_bank" name="akun_bank">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Cabang</label>
                                        <input type="text" class="form-control" id="cabang_bank" name="cabang_bank">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>No Rekening</label>
                                        <input type="text" class="form-control" id="no_rek" name="no_rek">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-account" role="tabpanel" aria-labelledby="custom-content-above-account-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Penjamin </label>
                                        <input type="text" class="form-control" id="nama_penjamin" name="nama_penjamin">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-syarat" role="tabpanel" aria-labelledby="custom-content-above-syarat-tab"></div>
                            <div class="row">
                                {{-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Penjamin </label>
                                        <input type="text" class="form-control" id="nama_penjamin" name="nama_penjamin">
                                    </div>
                                </div> --}}
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
            $("#sekstbl").DataTable({
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
