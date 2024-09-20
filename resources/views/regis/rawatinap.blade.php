@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Ruangan Tujuan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md 4">
                                                <label for="asal_poli">Asal Poli</label>
                                                <select id="asal_poli" name="asal_poli" class="form-control">
                                                    @foreach ($poli as $poli)
                                                        <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md 4">
                                                <label for="dokter_pengirim">Dokter Pengirim</label>
                                                <select id="dokter_pengirim" name="dokter_pengirim" class="form-control">
                                                    @foreach ($dokter as $dokter)
                                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md 4">
                                                <label for="tanggal_rawat">Tanggal Rawat</label>
                                                <input type="text" class="form-control" id="tanggal_rawat" name="tanggal_rawat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2 d-flex flex-column justify-content-end">
                                                <label for="ruang">Pilih Ruangan</label>
                                                <button type="button" class="btn btn-primary w-100" id="ruang">Cari Ruangan</button>
                                            </div>
                                            <div class="col-md-5 d-flex align-items-end">
                                                <input type="text" class="form-control" id="pilih_ruangan" name="pilih_ruangan" placeholder="Ruangan" disabled>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="dokter_dpjb">Dokter DPJB</label>
                                                <input type="text" class="form-control" id="dokter_dpjb" name="dokter_dpjb">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="card-header" id="kecelakan-header" style="display: none;">
                                        <h5><i class="fa fa-user"></i> Pasien Kecelakan</h5>
                                    </div>
                                    <div class="card-body" id="kecelakan-section" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="jeskec">Jenis Kecelakaan</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih Jenis Kecelakaan ---</option>
                                                    <option value="1">Kecelakaan Ringan</option>
                                                    <option value="2">Kecelakaan Sedang</option>
                                                    <option value="3">Kecelakaan Berat</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="nopol">No Pol</label>
                                                <input type="text" class="form-control" id="nopol" name="nopol">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tglkej">Tanggal Kejadian</label>
                                                <input type="date" class="form-control" id="tglkej" name="tglkej">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Penjamin">Penjamin</label>
                                                <select id="Penjamin" name="Penjamin" class="form-control">
                                                    <option value="">--- Cari Penjamin ---</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="ket">Keterangan</label>
                                                <input type="text" class="form-control" id="ket" name="ket">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Identitas Pasien -->
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-stretch">
                                    <div class="card w-100">
                                        <div class="card-header bg-light">
                                            <h5><i class="fa fa-user"></i> Penanggung Jawab</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="nama_penanggung">Nama Penanggung</label>
                                                    <input type="text" class="form-control" id="nama_penanggung" name="nama_penanggung">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="hub_penanggung">Hub Penanggung</label>
                                                    <input type="text" class="form-control" id="hub_penanggung" name="hub_penanggung">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="no_telp">No. Telp</label>
                                                    <input type="number" class="form-control" id="no_telp" name="no_telp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="keterangan">Keterangan</label>
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Penjamin -->
                                <div class="col-md-6 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Penjamin</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="hub_pasien">Hub Dengan Pasien</label>
                                                <select id="hub_pasien" name="hub_pasien" class="form-control">
                                                    <option value="">--- Pilih ---</option>
                                                    <option value="kepala_keluarga">Kepala Keluarga</option>
                                                    <option value="suami">Suami</option>
                                                    <option value="istri">Istri</option>
                                                    <option value="anak">Anak</option>
                                                    <option value="menantu">Menantu</option>
                                                    <option value="cucu">Cucu</option>
                                                    <option value="orang_tua">Orang Tua</option>
                                                    <option value="mertua">Mertua</option>
                                                    <option value="keluarga_lain">Keluarga Lain</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_keluarga">Nama Keluarga</label>
                                                <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="alamat_penjamin">Alamat</label>
                                                <input type="text" class="form-control" id="alamat_penjamin" name="alamat_penjamin">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="jenis_kartu">Jenis Kartu</label>
                                                <select id="jenis_kartu" name="jenis_kartu" class="form-control">
                                                    <option value="">--- Pilih Jenis Kartu ---</option>
                                                    <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
                                                    <option value="kartu_pelajar">Kartu Pelajar</option>
                                                    <option value="passport">Passport</option>
                                                    <option value="kitas">Kartu Izin Tinggal Sementara (KITAS)</option>
                                                    <option value="kitt">Kartu Izin Tinggal Tetap</option>
                                                    <option value="ktp_wna">KTP WNA</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="no_kartu" name="no_kartu" placeholder="No. Kartu">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buttons Section -->
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                            <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                        </button>
                                        <button type="button" class="btn" style="background-color: #ff851b; color: white;">
                                            <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Pasien</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patienttbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Penjamin</th>
                                            <th>No.REG</th>
                                            <th width="20%">Pilihan</th>
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

    <script>
        $(document).ready(function() {
            $("#patienttbl").DataTable({
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
