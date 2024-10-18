@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <form action="{{ route('regis.ranap.add') }}" method="POST" class="row w-100">
                        @csrf
                    <div class="mt-3 col-12">
                        <div class="row">
                            <!-- Ruangan Tujuan -->
                            <div class="col-md-12" id="kecelakan-col" style="display: none;">
                                <div class="card" id="kecelakan-card" style="display: none;">
                                    <div class="card-header bg-light" id="kecelakan-header" style="display: none;">
                                        <h5><i class="fa fa-user"></i> Ruangan Tujuan</h5>
                                    </div>
                                    <div class="card-body" id="kecelakan-section" style="display: none;">
                                        <div class="form-group row">

                                                <div class="col-md-4" id="asal_poli_container" style="display:none;">
                                                    <label for="asal_poli">Asal Poli</label>
                                                    <select id="asal_poli" name="asal_poli" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        @foreach ($poli as $poliItem)
                                                            <option value="{{ $poliItem->id }}">{{ $poliItem->nama_poli }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4" id="dokter_pengirim_container" style="display:none;">
                                                    <label for="dokter_pengirim">Dokter Pengirim</label>
                                                    <select id="dokter_pengirim" name="dokter_pengirim" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        @foreach ($dokter as $dokterItem)
                                                            <option value="{{ $dokterItem->id }}">{{ $dokterItem->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4" id="dokter_pengirim_luar_container" style="display:none;">
                                                    <label for="dokter_pengirim_luar">Dokter Pengirim Luar</label>
                                                    <input type="text" class="form-control" id="dokter_pengirim_luar" name="dokter_pengirim_luar" placeholder="Nama Dokter Pengirim">
                                                </div>

                                                <div class="col-md-4" id="nama_rumah_sakit_container" style="display:none;">
                                                    <label for="nama_rumah_sakit">Nama Rumah Sakit</label>
                                                    <select id="nama_rumah_sakit" name="nama_rumah_sakit" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        @foreach ($rujukan as $data)
                                                            <option value="{{ $data->id }}">{{ $data->nama_rujukan }}</option>
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
                                                    <option value="">-- Pilih --</option>
                                                    @foreach ($bangsal as $bangsal)
                                                        <option value="{{ $bangsal->id }}">{{ $bangsal->nama_bangsal }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dokter_dpjb">Dokter DPJB</label>
                                                <select id="dokter_dpjb" name="dokter_dpjb" class="form-control">
                                                    <option value="">-- Pilih --</option>
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
                                            <h5><i class="fa fa-user"></i> Data Pasien</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="no_reg">No. Reg</label>
                                                    <input type="text" class="form-control" id="no_reg" name="no_reg" placeholder="Isikan No. Registrasi">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>&nbsp;</label>
                                                    <!-- Empty label for spacing -->
                                                    <button type="button" class="btn btn-primary btn-block" id="generate-no-reg-button">Generate</button>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="no_rm">No. RM</label>
                                                    <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Isikan No. RM">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>&nbsp;</label>
                                                    <!-- Empty label for spacing -->
                                                    <button type="button" class="btn btn-primary btn-block" id="generate-no-rm-button">Cari No. RM</button>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="nama_pasien">Nama Pasien</label>
                                                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="nama_penanggung">Nama Penanggung</label>
                                                    <select id="nama_penanggung" name="nama_penanggung" class="form-control">
                                                        <option value="">--- Pilih ---</option>
                                                            @foreach ($penjamin as $penjamin)
                                                            <option value="{{ $penjamin->id }}" data-alamat="{{ $penjamin->alamat }}" data-no_telp="{{ $penjamin->telp }}">{{ $penjamin->pj }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="telepon">No. Telp</label>
                                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="asal_rujukan">Asal Rujukan</label>
                                                    <select id="asal_rujukan" name="asal_rujukan" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="UGD">UGD</option>
                                                        <option value="Poli">Poli</option>
                                                        <option value="Umum">Rujukan Luar</option>
                                                    </select>
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
                                        <button type="button" class="mr-2 btn btn-light" style="background-color: #17a2b8; color: white;">
                                            <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn" style="background-color: #ff851b; color: white;">
                                            <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">Pasien</h3>
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
                                            <th>Dokter Pengirim</th>
                                            <th>Dokter Penerima</th>
                                            <th>Penjamin</th>
                                            <th>No.REG</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ranap as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->tanggal_rawat }}</td>
                                                <td>{{ $data->pasien_id }}</td>
                                                <td>{{ $data->nama_pasien }}</td>
                                                <td>{{ $data->poli ? $data->poli->nama_poli : 'Tidak Ada Poli' }}</td>
                                                <td>{{ $data->docrim ? $data->docrim->nama : $data->dokter_pengirim_luar }}</td>
                                                <td>{{ $data->doctor->nama }}</td>
                                                <td>{{ $data->penjab->pj }}</td>
                                                <td>{{ $data->no_reg }}</td>
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

    <script>
        $(document).ready(function() {
    $('#asal_rujukan').on('change', function() {
        var selectedValue = $(this).val();

        if (selectedValue === 'UGD') {
            // Show only "Dokter Pengirim", hide the others
            $('#asal_poli_container').hide();
            $('#dokter_pengirim_container').show();
            $('#dokter_pengirim_luar_container').hide();
            $('#nama_rumah_sakit_container').hide();
        } else if (selectedValue === 'Poli') {
            // Show both "Asal Poli" and "Dokter Pengirim", hide "Nama Rumah Sakit"
            $('#asal_poli_container').show();
            $('#dokter_pengirim_container').show();
            $('#dokter_pengirim_luar_container').hide();
            $('#nama_rumah_sakit_container').hide();
        } else if (selectedValue === 'Umum') {
            // Show "Nama Rumah Sakit" only, hide the others
            $('#asal_poli_container').show();
            $('#dokter_pengirim_luar_container').show();
            $('#dokter_pengirim_container').hide();
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

    <script>
        $(document).ready(function() {
            // Ketika dropdown 'Asal Rujukan' berubah
            $('#asal_rujukan').change(function() {
                // Mendapatkan nilai yang dipilih
                var asalRujukan = $(this).val();

                // Sembunyikan dulu semua bagian dari "Ruangan Tujuan"
                $('#kecelakan-col').hide();
                $('#kecelakan-card').hide();
                $('#kecelakan-header').hide();
                $('#kecelakan-section').hide();

                // Sembunyikan semua container spesifik
                $('#asal_poli_container').hide();
                $('#dokter_pengirim_container').hide();
                $('#dokter_pengirim_luar_container').hide();
                $('#nama_rumah_sakit_container').hide();

                // Jika pilihan UGD
                if (asalRujukan === "UGD") {
                    $('#kecelakan-col').show();
                    $('#kecelakan-card').show();
                    $('#kecelakan-header').show();
                    $('#kecelakan-section').show();
                    $('#dokter_pengirim_container').show();
                }
                // Jika pilihan Poli
                else if (asalRujukan === "Poli") {
                    $('#kecelakan-col').show();
                    $('#kecelakan-card').show();
                    $('#kecelakan-header').show();
                    $('#kecelakan-section').show();
                    $('#asal_poli_container').show();
                    $('#dokter_pengirim_container').show();
                }
                // Jika pilihan Rujukan Luar (Umum)
                else if (asalRujukan === "Umum") {
                    $('#kecelakan-col').show();
                    $('#kecelakan-card').show();
                    $('#kecelakan-header').show();
                    $('#kecelakan-section').show();
                    $('#dokter_pengirim_luar_container').show();
                    $('#nama_rumah_sakit_container').show();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#generate-no-reg-button').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/generate-no-reg-ranap', // URL ke rute Laravel
                    method: 'GET',
                    success: function(response) {
                        // Menampilkan nomor registrasi di input field
                        $('#no_reg').val(response.no_reg);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + error);
                    }
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#generate-no-rm-button').click(function(e) {
            e.preventDefault();
            var no_rm = $('#no_rm').val();
            $.ajax({
                url: '/cari-no-rm', // Ganti dengan rute yang sesuai
                method: 'GET',
                data: { no_rm: no_rm },
                success: function(response) {
                    if(response.status === 'success') {
                        $('#nama_pasien').val(response.data.nama);
                        $('#alamat').val(response.data.alamat);
                        $('#telepon').val(response.data.telepon);
                    } else {
                        alert(response.message);
                        // Bersihkan form jika pasien tidak ditemukan
                        $('#nama_pasien').val('');
                        $('#alamat').val('');
                        $('#telepon').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                }
            });
        });
    });
</script>



@endsection
