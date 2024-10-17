@extends('template.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <form action="{{ route('soap.add') }}" method="POST" class="row w-100">
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
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="time">Jam</label>
                                                <input type="time" class="form-control" id="time" name="time">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rawat">Id Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat" value="{{$rajaldata->no_rawat}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rm">No. RM</label>
                                                <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{$rajaldata->no_rm}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" value="{{$rajaldata->nama_pasien}}" name="nama_pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="umur">Umur</label>
                                                <input type="text" class="form-control" value="{{$umur}}" id="umur" name="umur" readonly>
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
                                                <label for="sadar">Kesadaran</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="sadar" name="sadar">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <option value="Compos Mentis">Compos Mentis</option>
                                                    <option value="Somnolence">Somnolence</option>
                                                    <option value="Sopor">Sopor</option>
                                                    <option value="Coma">Coma</option>
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
                                        <button type="button" class="ml-2 btn btn-secondary" id="toggleICD">
                                            <i class="fa fa-print"></i> ICD 10 & 9
                                        </button>
                                        {{-- <button type="button" class="ml-2 btn btn-info">
                                            <i class="fa fa-history"></i> Riwayat
                                        </button>
                                        <button type="button" class="ml-2 btn btn-success">
                                            <i class="fa fa-check"></i> Selesai
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </form>

                            <!-- Tabel ICD -->
                            <div class="ml-auto col-md-9 align-items-stretch">
                                <div class="card w-100" id="icdCard" style="display: none;">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-group row align-items-center">
                                                    <label for="icd10" class="ml-2 col-form-label">Diagnosa (ICD 10)</label>
                                                    <div class="ml-1">
                                                        <button type="button" class="ml-2 btn btn-default" id="kodeICD10">KODE ICD 10</button>
                                                        <button type="button" class="ml-2 btn btn-default dropdown-toggle" id="dropdownMenuButtonICD10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span id="prioritas_icd_10" class="caret">Pilih</span>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonICD10">
                                                            <li><a class="dropdown-item" data-value="1">1</a></li>
                                                            <li><a class="dropdown-item" data-value="2">2</a></li>
                                                            <li><a class="dropdown-item" data-value="3">3</a></li>
                                                            <li><a class="dropdown-item" data-value="4">4</a></li>
                                                            <li><a class="dropdown-item" data-value="5">5</a></li>
                                                            <li><a class="dropdown-item" data-value="6">6</a></li>
                                                            <li><a class="dropdown-item" data-value="7">7</a></li>
                                                            <li><a class="dropdown-item" data-value="8">8</a></li>
                                                            <li><a class="dropdown-item" data-value="9">9</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="input-group" style="display: flex; align-items: center;">
                                                    <select class="form-control select2bs4" style="width: 80%;" id="icd10" name="icd10">
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        @foreach ($icd10 as $data)
                                                            <option value="{{$data->kode}}" data-nama="{{$data->nama}}">{{$data->kode}} - {{$data->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- Tombol check yang sejajar dengan dropdown -->
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-secondary" id="acceptICD10">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row align-items-center">
                                                    <label for="icd9" class="ml-2 col-form-label">Diagnosa (ICD 9)</label>
                                                    <div class="ml-1">
                                                        <!-- Tombol yang akan menampilkan kode ICD 9 -->
                                                        <button type="button" class="ml-2 btn btn-default" id="kodeICD9">KODE ICD 9</button>
                                                        <!-- Dropdown Prioritas -->
                                                        <button type="button" class="ml-2 btn btn-default dropdown-toggle" id="dropdownMenuButtonICD9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span id="prioritas_icd_9" class="caret">Pilih</span>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonICD9">
                                                            <li><a class="dropdown-item" data-value="1">1</a></li>
                                                            <li><a class="dropdown-item" data-value="2">2</a></li>
                                                            <li><a class="dropdown-item" data-value="3">3</a></li>
                                                            <li><a class="dropdown-item" data-value="4">4</a></li>
                                                            <li><a class="dropdown-item" data-value="5">5</a></li>
                                                            <li><a class="dropdown-item" data-value="6">6</a></li>
                                                            <li><a class="dropdown-item" data-value="7">7</a></li>
                                                            <li><a class="dropdown-item" data-value="8">8</a></li>
                                                            <li><a class="dropdown-item" data-value="9">9</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <!-- Dropdown ICD 9 menggunakan -->
                                                <div class="input-group" style="display: flex; align-items: center;">
                                                    <select class="form-control select2bs4" style="width: 80%;" id="icd9" name="icd9">
                                                        <option value="" disabled selected>-- Pilih --</option>
                                                        @foreach ($icd9 as $data)
                                                            <option value="{{$data->id}}" data-code="{{$data->kode}}" data-nama="{{$data->nama}}">{{$data->kode}} - {{$data->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!-- Tombol Accept -->
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-secondary" id="acceptICD9">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabel ICD -->
                            <div class="col-md-12 align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-trash-can"></i> ICD 9 dan ICD 10</h5>
                                    </div>
                                    <div class="table-responsive no-margin" style="padding: 13px;"> <!-- Padding untuk jarak -->
                                        <table class="table table-bordered no-padding icd" width="100%" style="border-spacing: 0; border-collapse: collapse;">
                                            <tbody>
                                                <tr class="isi_10">
                                                    <td valign="top" width="200px" style="vertical-align: middle;"> Diagnosa/Penyakit/ICD 10 </td>
                                                    <td valign="top" width="1px" style="vertical-align: middle;"> : </td>
                                                    <td valign="top">
                                                        <table width="100%" cellpadding="3px" cellspacing="0" class="icd_10">
                                                            <thead>
                                                                <tr align="center">
                                                                    <td valign="top" width="100px" style="border: none;">Kode</td>
                                                                    <td valign="top" style="border: none;">Nama Penyakit</td>
                                                                    <td valign="top" width="100px" style="border: none;">Prioritas</td>
                                                                    <td valign="top" width="100px" style="border: none;">Aksi</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($diagnosas as $item)
                                                                    <tr align="center" data-id="{{ $item->id }}">
                                                                        <td valign="top" style="border: none;">{{ $item->kode }}</td>
                                                                        <td valign="top" style="border: none;">{{ $item->icd10->nama }}</td>
                                                                        <td valign="top" style="border: none;">{{ $item->prioritas }}</td>
                                                                        <td valign="top" style="border: none;">
                                                                            <button type="button" class="btn btn-danger btn-sm deleteICD10">Hapus</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr class="isi_9">
                                                    <td valign="top" width="250px" style="vertical-align: middle;">Diagnosa/Penyakit/ICD 9</td>
                                                    <td valign="top" width="1px" style="vertical-align: middle;">:</td>
                                                    <td valign="top">
                                                        <table width="100%" cellpadding="3px" cellspacing="0" class="icd_9">
                                                            <tbody>
                                                                <tr align="center">
                                                                    <td valign="top" width="100px" style="border: none;">Kode</td>
                                                                    <td valign="top" style="border: none;">Nama Tindakan</td>
                                                                    <td valign="top" width="100px" style="border: none;">Prioritas</td>
                                                                    <td valign="top" width="100px" style="border: none;">Aksi</td>
                                                                </tr>
                                                                <!-- Baris baru akan ditambahkan di sini -->
                                                                @foreach($prosedur as $item)
                                                                    <tr align="center" data-id="{{ $item->id }}">
                                                                        <td valign="top" style="border: none;">{{ $item->kode }}</td>
                                                                        <td valign="top" style="border: none;">{{ $item->icd9->nama }}</td>
                                                                        <td valign="top" style="border: none;">{{ $item->prioritas }}</td>
                                                                        <td valign="top" style="border: none;">
                                                                            <button type="button" class="btn btn-danger btn-sm deleteICD9">Hapus</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Pasien</h3>
                        </div>
                        <div class="card-body" id="kunjungan-section">
                            <table id="kunjungan-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Suhu(C)</th>
                                        <th>Tensi(mmHg)</th>
                                        <th>Nadi(menit)</th>
                                        <th>RR(menit)</th>
                                        <th>Tinggi(cm)</th>
                                        <th>Berat(Kg)</th>
                                        <th>GCS(E,V,M)</th>
                                        <th>SPO2</th>
                                        <th>Alergi</th>
                                        <th>Instruksi & Evaluasi</th>
                                        {{-- <th>Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pemeriksaans as $index => $pemeriksaan)
                                    <tr>
                                        <td rowspan="8" style="vertical-align:top;">{{ $index + 1 }}</td>
                                        <td rowspan="7" style="vertical-align:top;white-space: nowrap;">{{ $pemeriksaan->tgl_kunjungan }}<br>{{ $pemeriksaan->time }}</td>
                                        <td>{{ $pemeriksaan->tensi }}</td>
                                        <td>{{ $pemeriksaan->suhu }}</td>
                                        <td>{{ $pemeriksaan->nadi }}</td>
                                        <td>{{ $pemeriksaan->rr }}</td>
                                        <td>{{ $pemeriksaan->tinggi_badan }}</td>
                                        <td>{{ $pemeriksaan->berat_badan }}</td>
                                        <td>{{ $pemeriksaan->spo2 }}</td>
                                        <td>{{ $pemeriksaan->gcs }}</td>
                                        <td>{{ $pemeriksaan->alergi }}</td>
                                        <td rowspan="8" style="vertical-align:top;">
                                            <b>Instruksi:</b> {{ $pemeriksaan->instruksi }}<br><br>
                                            <b>Evaluasi:</b> {{ $pemeriksaan->evaluasi }}<br><br>
                                            {{-- QRCODE DOCTER --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Kesadaran</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->kesadaran }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Lingkar Perut</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->lingkar_perut }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Subyektif</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->subyektif }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Obyektif</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->obyektif }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Assesment</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->assessmen }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>Plan</b></td>
                                        <td colspan="7"> {{ $pemeriksaan->plan }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="10">
                                            <form action="{{ route('delete.route', $pemeriksaan->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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

{{-- Script untuk umur dan tgl jam --}}
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

{{-- script untuk membuka card ICD --}}
    <script>
        document.getElementById('toggleICD').addEventListener('click', function() {
            var icdCard = document.getElementById('icdCard');

            // Memeriksa apakah card sedang ditampilkan atau disembunyikan
            if (icdCard.style.display === "none" || icdCard.style.display === "") {
                icdCard.style.display = "block";  // Menampilkan card
            } else {
                icdCard.style.display = "none";  // Menyembunyikan card
            }
        });
    </script>

{{-- Final Script untuk ICD-10 --}}
    <script>
        $(document).ready(function () {
            var selectedICD10 = null;
            var selectedPriorityICD10 = null;

            // Event listener for ICD-10 select dropdown
            $('#icd10').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                selectedICD10 = {
                    code: selectedOption.val(),
                    name: selectedOption.data('nama')
                };
                // Display the selected code on the button
                $('#kodeICD10').text(selectedICD10.code);
            });

            // Event listener for priority dropdown items, specifically for ICD-10
            $('#dropdownMenuButtonICD10').next('.dropdown-menu').find('.dropdown-item').on('click', function () {
                selectedPriorityICD10 = $(this).data('value');
                // Display the selected priority in the span
                $('#prioritas_icd_10').text(selectedPriorityICD10);
            });

            // Event listener for clicking the Accept button
            $('#acceptICD10').on('click', function () {
                if (!selectedICD10 || !selectedPriorityICD10) {
                    alert('Pilih Diagnosa dan Prioritas!');
                    return;
                }

                // Check if the selected ICD-10 already exists in the table
                var exists = false;
                $('.icd_10 tbody tr').each(function () {
                    var code = $(this).find('td:first').text().trim();
                    if (code === selectedICD10.code) {
                        exists = true;
                        return false; // exit loop if found
                    }
                });

                if (exists) {
                    alert('Data sudah ada di tabel.');
                } else {
                    // Make an AJAX request to save the data to the database
                    $.ajax({
                        url: '{{ route("diagnosa.store") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            no_rawat: '{{ $rajaldata->no_rawat }}',
                            kode: selectedICD10.code,
                            prioritas: selectedPriorityICD10,
                            status_penyakit: 'your_status_value_here' // Set status_penyakit accordingly
                        },
                        success: function (response) {
                            if (response.success) {
                                // Add the new row to the table
                                var newRow = '<tr align="center" data-id="' + response.id + '">' +
                                    '<td valign="top" style="border: none;">' + selectedICD10.code + '</td>' +
                                    '<td valign="top" style="border: none;">' + selectedICD10.name + '</td>' +
                                    '<td valign="top" style="border: none;">' + selectedPriorityICD10 + '</td>' +
                                    '<td valign="top" style="border: none;"><button type="button" class="btn btn-danger btn-sm deleteICD10">Hapus</button></td>' +
                                    '</tr>';
                                $('.icd_10 tbody').append(newRow);

                                // Reset the fields after adding the data
                                resetFieldsICD10();
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr) {
                            alert('Error occurred: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Event listener for removing rows from the ICD-10 table and deleting from the database
            $(document).on('click', '.deleteICD10', function () {
                var row = $(this).closest('tr');
                var id = row.data('id'); // Get the ID from the data-id attribute

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    // Send an AJAX request to delete the record from the database
                    $.ajax({
                        url: '{{ route("diagnosa.destroy") }}', // Route for deleting
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id  // Pass the ID to delete
                        },
                        success: function (response) {
                            if (response.success) {
                                row.remove(); // Remove the row from the table
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr) {
                            alert('Error occurred: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Function to reset the form fields after accept
            function resetFieldsICD10() {
                $('#icd10').val('').trigger('change');
                $('#kodeICD10').text('KODE ICD 10');
                $('#prioritas_icd_10').text('Pilih');
                selectedICD10 = null;
                selectedPriorityICD10 = null;
            }
        });
    </script>

{{-- Final Script ICD-9 --}}
    <script>
        $(document).ready(function () {
            var selectedICD9 = null;
            var selectedPriority = null;

            // Event listener for ICD-9 select dropdown
            $('#icd9').on('change', function () {
                var selectedOption = $(this).find('option:selected');
                selectedICD9 = {
                    id: selectedOption.val(),
                    code: selectedOption.data('code'),
                    name: selectedOption.data('nama')
                };
                // Display the selected code on the button
                $('#kodeICD9').text(selectedICD9.code);
            });

            // Event listener for priority dropdown items, specifically for ICD-9
            $('#dropdownMenuButtonICD9').next('.dropdown-menu').find('.dropdown-item').on('click', function () {
                selectedPriority = $(this).data('value');
                // Display the selected priority in the span
                $('#prioritas_icd_9').text(selectedPriority);
            });

            // Event listener for clicking the Accept button
            $('#acceptICD9').on('click', function () {
                if (!selectedICD9 || !selectedPriority) {
                    alert('Pilih Diagnosa dan Prioritas!');
                    return;
                }

                // Check if the selected ICD-9 already exists in the table
                var exists = false;
                $('.icd_9 tbody tr').each(function () {
                    var code = $(this).find('td:first').text().trim();
                    if (String(code) === String(selectedICD9.code)) {
                        exists = true;
                        return false; // exit loop if found
                    }
                });

                if (exists) {
                    alert('Data sudah ada di tabel.');
                } else {
                    // Make an AJAX request to save the data to the database
                    $.ajax({
                        url: '{{ route("prosedur.store") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            no_rawat: '{{ $rajaldata->no_rawat }}',
                            kode: selectedICD9.code,
                            prioritas: selectedPriority
                        },
                        success: function (response) {
                            if (response.success) {
                                // Add the new row to the table
                                var newRow = '<tr align="center" data-id="' + response.id + '">' +
                                    '<td valign="top" style="border: none;">' + selectedICD9.code + '</td>' +
                                    '<td valign="top" style="border: none;">' + selectedICD9.name + '</td>' +
                                    '<td valign="top" style="border: none;">' + selectedPriority + '</td>' +
                                    '<td valign="top" style="border: none;"><button type="button" class="btn btn-danger btn-sm deleteICD9">Hapus</button></td>' +
                                    '</tr>';
                                $('.icd_9 tbody').append(newRow);

                                // Reset the fields after adding the data
                                resetFields();
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr) {
                            alert('Error occurred: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Event listener for removing rows from the ICD-9 table and deleting from the database
            $(document).on('click', '.deleteICD9', function () {
                var row = $(this).closest('tr');
                var kode = row.find('td:first').text().trim(); // Get the ICD-9 code from the first column
                var id = row.data('id'); // Get the ID from the data-id attribute

                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    // Send an AJAX request to delete the record from the database
                    $.ajax({
                        url: '{{ route("prosedur.destroy") }}', // Route for deleting
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,  // Pass the ID to delete
                            kode: kode // (Optional) pass the kode if needed
                        },
                        success: function (response) {
                            if (response.success) {
                                row.remove(); // Remove the row from the table
                            } else {
                                alert('Error: ' + response.message);
                            }
                        },
                        error: function (xhr) {
                            alert('Error occurred: ' + xhr.responseText);
                        }
                    });
                }
            });

            // Function to reset the form fields after accept
            function resetFields() {
                $('#icd9').val('').trigger('change');
                $('#kodeICD9').text('KODE ICD 9');
                $('#prioritas_icd_9').text('Pilih');
                selectedICD9 = null;
                selectedPriority = null;
            }
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
