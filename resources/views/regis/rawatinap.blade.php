@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Ruangan Tujuan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="asal_rujukan">Asal Rujukan</label>
                                                    <select id="asal_rujukan" name="asal_rujukan" class="form-control">
                                                        <option value="UGD">UGD</option>
                                                        <option value="Poli">Poli</option>
                                                        <option value="Umum">Rujukan Luar</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4" id="asal_poli_container" style="display:none;">
                                                    <label for="asal_poli">Asal Poli</label>
                                                    <select id="asal_poli" name="asal_poli" class="form-control">
                                                        @foreach ($poli as $poliItem)
                                                            <option value="{{ $poliItem->id }}">{{ $poliItem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4" id="dokter_pengirim_container" style="display:none;">
                                                    <label for="dokter_pengirim">Dokter Pengirim</label>
                                                    <select id="dokter_pengirim" name="dokter_pengirim" class="form-control">
                                                        @foreach ($dokter as $dokterItem)
                                                            <option value="{{ $dokterItem->id }}">{{ $dokterItem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4" id="nama_rumah_sakit_container" style="display:none;">
                                                    <label for="nama_rumah_sakit">Nama Rumah Sakit</label>
                                                    <select id="nama_rumah_sakit" name="nama_rumah_sakit" class="form-control">
                                                        @foreach ($poli as $poliItem)
                                                            <option value="{{ $poliItem->id }}">{{ $poliItem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            <div class="col-md 4">
                                                <label for="tanggal_rawat">Tanggal Rawat</label>
                                                <div class="input-group date" id="tanggal_rawat" data-target-input="nearest">
                                                    <input type="text" id="tanggal_rawat" name="tanggal_rawat" class="form-control datetimepicker-input" data-target="#tanggal_rawat" />
                                                    <div class="input-group-append" data-target="#tanggal_rawat" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="r_perawatan">Ruangan</label>
                                                <select id="r_perawatan" name="r_perawatan" class="form-control">
                                                    @foreach ($bangsal as $bangsal)
                                                        <option value="{{ $bangsal->id }}">{{ $bangsal->nama_bangsal }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dokter_dpjb">Dokter DPJB</label>
                                                <select id="dokter_dpjb" name="dokter_dpjb" class="form-control">
                                                    @foreach ($dokter as $dokterItem)
                                                        <option value="{{ $dokterItem->id }}">{{ $dokterItem->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Identitas Pasien -->
                                <div class="col-md-6 d-flex align-items-stretch">
                                    <div class="card w-100">
                                        <div class="card-header bg-light">
                                            <h5><i class="fa fa-user"></i> Penjamin</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="nama_penanggung">Nama Penanggung</label>
                                                    <select id="nama_penanggung" name="nama_penanggung" class="form-control">
                                                        <option value="">--- Pilih ---</option>
                                                            @foreach ($penjamin as $penjamin)
                                                            <option value="{{ $penjamin->id }}" data-alamat="{{ $penjamin->alamat }}" data-no_telp="{{ $penjamin->telp }}">{{ $penjamin->pj }}</option>
                                                            @endforeach
                                                    </select>
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
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Penjamin -->
                                <div class="col-md-6 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i>Penanggung Jawab</h5>
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

                    <div class="col-12">
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
            $('#nama_penanggung').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var alamat = selectedOption.data('alamat');
                var noTelp = selectedOption.data('no_telp');

                $('#alamat').val(alamat);
                $('#no_telp').val(noTelp);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
    $('#asal_rujukan').on('change', function() {
        var selectedValue = $(this).val();

        if (selectedValue === 'UGD') {
            // Show only "Dokter Pengirim", hide the others
            $('#asal_poli_container').hide();
            $('#dokter_pengirim_container').show();
            $('#nama_rumah_sakit_container').hide();
        } else if (selectedValue === 'Poli') {
            // Show both "Asal Poli" and "Dokter Pengirim", hide "Nama Rumah Sakit"
            $('#asal_poli_container').show();
            $('#dokter_pengirim_container').show();
            $('#nama_rumah_sakit_container').hide();
        } else if (selectedValue === 'Umum') {
            // Show "Nama Rumah Sakit" only, hide the others
            $('#asal_poli_container').show();
            $('#dokter_pengirim_container').show();
            $('#nama_rumah_sakit_container').show();
        }
    });

    // Trigger change event on page load to set the initial state
    $('#asal_rujukan').trigger('change');
});

    </script>

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
