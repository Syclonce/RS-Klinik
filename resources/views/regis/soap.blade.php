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
                            <!-- Identitas Pasien -->
                            <div class="col-md-3 align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tgl_kunjungan">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="time">Jam</label>
                                                <input type="time" class="form-control" id="time" name="time">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="umur">Umur</label>
                                                <input type="text" class="form-control" value="{{$umur}}" id="umur" name="umur">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="no_rm">No. RM</label>
                                                <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{$rajaldata->no_rm}}" placeholder="Isikan No. RM">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" value="{{$rajaldata->nama_pasien}}" name="nama_pasien">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pemeriksaan -->
                            <div class="col-md-9 align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-stethoscope"></i> Pemeriksaan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="tensi">Tensi (mmHg)</label>
                                                <input type="text" class="form-control" id="tensi" name="tensi">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="suhu">Suhu (°C)</label>
                                                <input type="text" class="form-control" id="suhu" name="suhu">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="nadi">Nadi (/mnt)</label>
                                                <input type="text" class="form-control" id="nadi" name="nadi">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="rr">RR (/mnt)</label>
                                                <input type="text" class="form-control" id="rr" name="rr">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="tinggi">Tinggi (Cm)</label>
                                                <input type="text" class="form-control" id="tinggi" name="tinggi">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="berat">Berat (/Kg)</label>
                                                <input type="text" class="form-control" id="berat" name="berat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="poli">Kesadaran</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="poli" name="poli">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="spo2">SPO2</label>
                                                <input type="text" class="form-control" id="spo2" name="spo2">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="gcs">GCS(E,V,M)</label>
                                                <input type="text" class="form-control" id="gcs" name="gcs">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="alergi">Alergi</label>
                                                <input type="text" class="form-control" id="alergi" name="alergi">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="lingkar_perut">Lingkar Perut</label>
                                                <input type="text" class="form-control" id="lingkar_perut" name="lingkar_perut">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-file-alt"></i> SOAP</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="subyektif">Subyektif</label>
                                                <textarea class="form-control" id="subyektif" name="subyektif"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="obyektif">Obyektif</label>
                                                <textarea class="form-control" id="obyektif" name="obyektif"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="assessmen">Assessment</label>
                                                <textarea class="form-control" id="assessmen" name="assessmen"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="plan">Plan</label>
                                                <textarea class="form-control" id="plan" name="plan"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="instruksi">Instruksi</label>
                                                <textarea class="form-control" id="instruksi" name="instruksi"></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="evaluasi">Evaluasi</label>
                                                <textarea class="form-control" id="evaluasi" name="evaluasi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-floppy-disk"></i> Simpan
                                        </button>
                                        <button type="button" class="ml-2 btn btn-secondary">
                                            <i class="fa fa-print"></i> ICD 10 & 9
                                        </button>
                                        <button type="button" class="ml-2 btn btn-info">
                                            <i class="fa fa-history"></i> Riwayat
                                        </button>
                                        <button type="button" class="ml-2 btn btn-success">
                                            <i class="fa fa-check"></i> Selesai
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

                                </tbody>
                            </table>
                        </div>
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
        window.onload = function() {
            // Mengambil tanggal dan waktu saat ini
            var now = new Date();

            // Mengatur nilai input tanggal (YYYY-MM-DD)
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + month + "-" + day;
            document.getElementById("tgl_kunjungan").value = today;

            // Mengatur nilai input waktu (HH:MM)
            var hours = ("0" + now.getHours()).slice(-2);
            var minutes = ("0" + now.getMinutes()).slice(-2);
            var currentTime = hours + ":" + minutes;
            document.getElementById("time").value = currentTime;
        };
    </script>

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
