@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <form action="{{ route('regis.add') }}" method="POST" class="row w-100">
                        @csrf
                    <div class="col-12 mt-3">
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-6 d-flex">
                                <div class="card w-100 h-100">
                                    <div class="card-header bg-light d-flex align-items-center">
                                        <h5 class="mb-0"><i class="fa fa-user"></i> Identitas Pasien</h5>
                                        <div class="ml-auto">
                                            <a href="{{ route('regis.patient') }}" class="btn btn-success" id="pasien-baru-button">Pasien Baru</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="no_reg">No. Reg</label>
                                                <input type="text" class="form-control" id="no_reg" name="no_reg" placeholder="Isikan No. Registrasi">
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary btn-block" id="generate-no-reg-button">Generate</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="no_rm">No. RM</label>
                                                <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Isikan No. RM">
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary btn-block" id="generate-no-rm-button">Cari No. RM</button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rawat">No. Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat" placeholder="No. Rawat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="ktp">No KTP</label>
                                                <input type="text" class="form-control" id="ktp" name="ktp" placeholder="No KTP">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="satusehat" name="satusehat" placeholder="No Satusehat" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur Saat Ini" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="telepon">No. Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="activate_kecelakan">Apakah pasien Kecelakan</label>
                                                <select id="activate_kecelakan" name="activate_kecelakan" class="form-control">
                                                    <option value="">--- Pilih ---</option>
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pendaftaran IGD -->
                            <div class="col-md-6 d-flex">
                                <div class="card w-100 h-100">
                                    <div class="card-header bg-light d-flex align-items-center">
                                        <h5 class="mb-1 mt-2"><i class="fa fa-user"></i> Pendaftaran IGD</h5>
                                        <div class="flex-grow-1"></div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tanggal dan Dokter -->
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="tanggal_pendaftaran">Tanggal</label>
                                                <input type="date" class="form-control" id="tanggal_pendaftaran" name="tanggal_pendaftaran">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="dokter">Dokter</label>
                                                <select id="dokter" name="dokter" class="form-control">
                                                    <option value="">--- Pilih Dokter ---</option>
                                                    @foreach ($doctor as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="kode_dokter" name="kode_dokter" placeholder="Kode Dokter" readonly>
                                            </div>
                                        </div>

                                        <!-- Poli dan Penjamin -->
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="poli">Poli</label>
                                                <input type="text" id="poli" name="poli" class="form-control" value="Umum" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="penjamin">Penjamin</label>
                                                <select id="penjamin" name="penjamin" class="form-control">
                                                    <option value="">--- Pilih Penjamin ---</option>
                                                    @foreach ($penjab as $data)
                                                        <option value="{{ $data->id }}">{{ $data->pj }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="no_Kartu" name="no_Kartu" placeholder="No. Kartu">
                                            </div>
                                        </div>

                                        <!-- Penanggung Jawab Section -->
                                        <div class="card-header mt-3">
                                            <h5><i class="fa fa-user"></i> Penanggung Jawab</h5>
                                        </div>
                                        <div class="card-body">
                                            <!-- Hubungan Pasien -->
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="hubungan_pasien">Hubungan Pasien</label>
                                                    <select id="hubungan_pasien" name="hubungan_pasien" class="form-control">
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

                                            <!-- Nama Keluarga -->
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="nama_keluarga">Nama Keluarga</label>
                                                    <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga" placeholder="Nama Keluarga">
                                                </div>
                                            </div>

                                            <!-- Alamat Keluarga -->
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <label for="alamat_keluarga">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat_keluarga" name="alamat_keluarga" placeholder="Alamat">
                                                </div>
                                            </div>

                                            <!-- Jenis Kartu dan No Kartu -->
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="jenis_kartu">Jenis Kartu</label>
                                                    <select id="jenis_kartu" name="jenis_kartu" class="form-control">
                                                        <option value="">--- Pilih Jenis Kartu ---</option>
                                                        <option value="ktp">Kartu Tanda Penduduk (KTP)</option>
                                                        <option value="sim">Surat Izin Mengemudi (SIM)</option>
                                                        <option value="pelajar">Kartu Pelajar</option>
                                                        <option value="passport">Passport</option>
                                                        <option value="kitas">Kartu Izin Sementara (KITAS)</option>
                                                        <option value="kitap">Kartu Izin Tetap (KITAP)</option>
                                                        <option value="ktpwna">KTP WNA</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 d-flex align-items-end">
                                                    <input type="text" class="form-control" id="no_kartu_kel" name="no_kartu_kel" placeholder="No. Kartu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pasien Kecelakaan -->
                            <div class="col-md-12 mt-3 d-flex" id="kecelakaan-col" style="display: none;">
                                <div class="card w-100 h-100" id="kecelakaan-card" style="display: none;">
                                    <div class="card-header" id="kecelakan-header" style="display: none;">
                                        <h5><i class="fa fa-user"></i> Pasien Kecelakaan</h5>
                                    </div>
                                    <div class="card-body" id="kecelakan-section" style="display: none;">
                                        <!-- Jenis Kecelakaan dan No Pol -->
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="jeskec">Jenis Kecelakaan</label>
                                                <select id="jeskec" name="jeskec" class="form-control">
                                                    <option value="">--- Pilih Jenis Kecelakaan ---</option>
                                                    <option value="BKLL">Bukan Kecelakaan Lalu Lintas (BKLL)</option>
                                                    <option value="KLL">KLL dan Bukan Kecelakaan Kerja (BKK)</option>
                                                    <option value="KLL_KK">KLL dan KK</option>
                                                    <option value="KK">KK</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nopol">No Pol</label>
                                                <input type="text" class="form-control" id="nopol" name="nopol">
                                            </div>
                                        </div>

                                        <!-- Tanggal Kejadian dan Penjamin Kecelakaan -->
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tglkej">Tanggal Kejadian</label>
                                                <input type="date" class="form-control" id="tglkej" name="tglkej">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penjamin_kec">Penjamin Kecelakaan</label>
                                                <select id="penjamin_kec" name="penjamin_kec" class="form-control">
                                                    <option value="">--- Cari Penjamin ---</option>
                                                    <option value="Jasaraharja">Jasaraharja</option>
                                                    <option value="BPJS_ketenagakerjaan">BPJS Ketenagakerjaan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Keterangan Kecelakaan -->
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="ketkec">Keterangan Kecelakaan</label>
                                                <input type="text" class="form-control" id="ketkec" name="ketkec">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Button section as a separate card -->
                            <div class="col-md-12 mt-3 d-flex justify-content-center">
                                <div class="card w-100">
                                    <div class="card-body d-flex justify-content-center">
                                        <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
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
                                            <th>No. RM</th>
                                            <th>Nama Pasien</th>
                                            <th>ID Kunjungan</th>
                                            <th>Antrian</th>
                                            <th>Poliklinik</th>
                                            <th>Dokter</th>
                                            <th>Penjamin</th>
                                            <th>No. Asuransi</th>
                                            <th>Tgl. Kunjungan</th>
                                            <th>Stts. Periksa</th>
                                            <th>Stts. Lanjut</th>
                                            <th>Stts. Bayar</th>
                                            <th width="10%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ugd as $data)
                                            <tr>
                                                <td>{{ $data->no_rm }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->no_rawat }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->poli}}</td>
                                                <td>{{ $data->doctor->nama }}</td>
                                                <td>{{ $data->penjab->pj }}</td>
                                                <td>{{ $data->no_kartu_pen }}</td>
                                                <td>{{ $data->tgl_pendaftaran }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
            // Function to calculate age based on birth date
            function calculateAge(birthDate) {
                const today = new Date();
                let years = today.getFullYear() - birthDate.getFullYear();
                let months = today.getMonth() - birthDate.getMonth();
                let days = today.getDate() - birthDate.getDate();

                // Adjust days if the current day is before the birthday
                if (days < 0) {
                    months--;
                    const lastMonthDate = new Date(today.getFullYear(), today.getMonth(), 0); // Last date of the previous month
                    days += lastMonthDate.getDate(); // Add days of the last month
                }

                // Adjust months if the current month is before the birth month
                if (months < 0) {
                    years--;
                    months += 12; // Adjust to get positive months
                }

                // Format the age string
                return `Usia saat ini: ${years} tahun ${months} bulan ${days} hari`;
            }

            // Fetch data when the "generate-no-rm-button" is clicked
            $('#generate-no-rm-button').click(function(e) {
                e.preventDefault();
                var no_rm = $('#no_rm').val();
                $.ajax({
                    url: '/cari-no-rm-ugd', // Replace with the appropriate route
                    method: 'GET',
                    data: { no_rm: no_rm },
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#nama').val(response.data.nama);
                            $('#sex').val(response.data.seks);
                            $('#ktp').val(response.data.no_ktp);
                            $('#satusehat').val(response.data.no_satusehat);
                            $('#tanggal_lahir').val(response.data.tgl_lahir);
                            $('#alamat').val(response.data.alamat);
                            $('#telepon').val(response.data.telepon);

                            // Calculate age immediately after fetching data
                            const dateParts = response.data.tgl_lahir.split('/');
                            const birthDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]); // YYYY, MM-1, DD
                            const ageString = calculateAge(birthDate);
                            $('#umur').val(ageString);
                        } else {
                            alert(response.message);
                            // Clear form if patient not found
                            $('#nama').val('');
                            $('#sex').val('');
                            $('#ktp').val('');
                            $('#satusehat').val('');
                            $('#tanggal_lahir').val('');
                            $('#alamat').val('');
                            $('#telepon').val('');
                            $('#umur').val(''); // Clear the age field
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + error);
                        alert('Terjadi kesalahan saat mengambil data. Silakan coba lagi.');
                    }
                });
            });

            // Update age when the birth date is changed
            $('#tanggal_lahir').on('change', function() {
                // Get the date value in DD/MM/YYYY format
                const dateParts = $(this).val().split('/');
                const birthDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]); // YYYY, MM-1, DD
                const ageString = calculateAge(birthDate);
                $('#umur').val(ageString);
            });
        });
    </script>




    <script>
        function toggleKecelakaanSection(show) {
            const kecelakanCol = document.getElementById('kecelakaan-col');
            const kecelakanCard = document.getElementById('kecelakaan-card');
            const kecelakanSection = document.getElementById('kecelakan-section');
            const kecelakanHeader = document.getElementById('kecelakan-header');

            if (show) {
                kecelakanCol.style.display = 'block';
                kecelakanCard.style.display = 'block';
                kecelakanSection.style.display = 'block';
                kecelakanHeader.style.display = 'block';
            } else {
                kecelakanCol.style.display = 'none';
                kecelakanCard.style.display = 'none';
                kecelakanSection.style.display = 'none';
                kecelakanHeader.style.display = 'none';
            }
        }

        // Event listener for the "Apakah pasien Kecelakan" dropdown
        document.getElementById('activate_kecelakan').addEventListener('change', function() {
            toggleKecelakaanSection(this.value === '1');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#generate-no-reg-button').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '/generate-no-reg-ugd', // URL ke rute Laravel
                    method: 'GET',
                    success: function(response) {
                        // Menampilkan nomor registrasi di input field
                        $('#no_reg').val(response.no_reg);

                        // Format No. Rawat as yyyy/mm/dd/no_reg
                        const today = new Date();
                        const yyyy = today.getFullYear();
                        const mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                        const dd = String(today.getDate()).padStart(2, '0');
                        const noRawat = `${yyyy}/${mm}/${dd}/${response.no_reg}`;

                        // Menampilkan nomor rawat di input field
                        $('#no_rawat').val(noRawat);
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
            $('#dokter').change(function() {
                var dokterId = $(this).val();
                if (dokterId) {
                    $.ajax({
                        url: '/get-kode-dokter-ugd/' + dokterId,
                        method: 'GET',
                        success: function(response) {
                            if (response.kode) {
                                $('#kode_dokter').val(response.kode);
                            } else {
                                $('#kode_dokter').val('');
                            }
                        },
                        error: function() {
                            $('#kode_dokter').val('');
                            alert('Kode dokter tidak ditemukan.');
                        }
                    });
                } else {
                    $('#kode_dokter').val('');
                }
            });
        });
    </script>
@endsection
