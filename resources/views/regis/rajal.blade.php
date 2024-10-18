@extends('template.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="mt-3 col-12">
                    <div class="row d-flex">
                        <div class="mb-3 col-md-12" id="kecelakan-col" style="display: none;">
                            <div class="card h-100" id="kecelakan-card" style="display: none;">
                                <div class="card-header bg-light" id="kecelakan-header" style="display: none;">
                                    <h5><i class="fa fa-user"></i> Pilih Data Pasien</h5>
                                </div>
                                <div class="card-body" id="kecelakan-section" style="display: none;">
                                    <table id="patienttbl" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. RM</th>
                                                <th>Nama Pasien</th>
                                                <th>Tgl. Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No. Telepon</th>
                                                <th width="15%">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table data will be populated here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Start Form -->
                        <form action="{{ route('regis.rajal.add') }}" method="POST" class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="mb-3 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Kelola Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tgl_kunjungan">Tanggal Daftar</label>
                                                <input type="date" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan">
                                            </div>
                                            <div class="col-md-5">
                                                <label for="timepicker">Jam</label>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" class="form-control timepicker-input" data-target="#timepicker" id="time" name="time">
                                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="nama">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Cari nama pasien">
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary btn-block" id="search-button">Cari</button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="dokter">Dokter</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="dokter" name="dokter">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($dokter as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="poli">Poli</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="poli" name="poli">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($poli as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_poli }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="penjamin">Penjamin</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="penjamin" name="penjamin">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($penjab as $data)
                                                        <option value="{{ $data->id }}">{{ $data->pj }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="no_reg">No. Reg</label>
                                                <input type="text" class="form-control" id="no_reg" name="no_reg">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no_rawat">No. Rawat</label>
                                                <input type="text" class="form-control" id="no_rawat" name="no_rawat">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Data Pasien -->
                            <div class="mb-3 col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Data Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="no_rm">Nomor RM</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="no_rm" name="no_rm" placeholder="Nomor Rekam Medis" readonly>
                                                    <div class="input-group-append" id="button-container" style="display: none;">
                                                        <button class="btn btn-primary dropdown-toggle" type="button" id="action-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span id="action-button-text">Pilihan</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama_pasien">Nama Pasien</label>
                                                <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="seks">Jenis Kelamin</label>
                                                <input type="text" class="form-control" id="seks" name="seks" placeholder="Jenis Kelamin Pasien" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="telepon">Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Nomor Telepon Pasien" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-floppy-disk"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->

                        </form>
                        <!-- End Form -->
                    </div>
                </div>

                <div class="mt-3 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 card-title">Pasien - Rawat Jalan</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="kunjungan-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No. RM</th>
                                        <th>Nama Pasien</th>
                                        <th>ID. Kunjungan</th>
                                        <th>Antrian</th>
                                        <th>Poliklinik</th>
                                        <th>Dokter</th>
                                        <th>Penjamin</th>
                                        <th>No. Asuransi</th>
                                        <th>Tgl. Kunjungan</th>
                                        <th>Status</th>
                                        <th>Status Lanjutan</th>
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rajal as $data)
                                        <tr>
                                            <td>
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">{{ $data->no_rm }}</button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('soap',['norm' => $data->no_rm ]) }}">SOAP & Pemeriksaan    </a>
                                                    <a class="dropdown-item" href="{{ route('layanan',['norm' => $data->no_rm ]) }}">Layanan & Tindakan</a>
                                                    <a class="dropdown-item" href="{{ route('regis.berkas',['norm' => $data->no_rm ]) }}">Berkas Digital</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#statusRawatModal" data-status="{{ $data->status }}" data-id="{{ $data->no_rm }}">Status Rawat</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#statusLanjutModal"
                                                        data-norm="{{ $data->no_rm }}"
                                                        data-nama="{{$data->nama_pasien}}"
                                                        data-poliid="{{$data->poli_id}}"
                                                        data-doctorid="{{$data->doctor_id}}"
                                                        data-penjabid="{{$data->penjab_id}}"
                                                        data-alamat="{{$data->pasien->Alamat}}"
                                                        data-telepon="{{$data->telepon}}">Status Lanjut</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                              </div>
                                            </td>
                                            <td>{{ $data->nama_pasien }}</td>
                                            <td>{{ $data->no_rawat }}</td>
                                            <td>{{ $data->no_reg }}</td>
                                            <td>{{ $data->poli->nama_poli }}</td>
                                            <td>{{ $data->doctor->nama }}</td>
                                            <td>{{ $data->penjab->pj }}</td>
                                            <td>{{ $data->pasien->no_bpjs }}</td>
                                            <td>{{ $data->tgl_kunjungan }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->status_lanjut }}</td>
                                            <td style="text-align: center; vertical-align: middle;">
                                                <form action="{{ route('rajal.delete', $data->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<div class="modal fade" id="statusRawatModal" tabindex="-1" role="dialog" aria-labelledby="statusRawatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusRawatModalLabel">Status Rawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="statusForm">
                    <input type="hidden" name="no_rm" id="no_rm">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="berkasDikirim" value="Berkas Dikirim">
                            <label class="form-check-label" for="berkasDikirim">Berkas Dikirim</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="berkasDiterima" value="Berkas Diterima">
                            <label class="form-check-label" for="berkasDiterima">Berkas Diterima</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="belumPeriksa" value="Belum Periksa">
                            <label class="form-check-label" for="belumPeriksa">Belum Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="sudahPeriksa" value="Sudah Periksa">
                            <label class="form-check-label" for="sudahPeriksa">Sudah Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="batalPeriksa" value="Batal Periksa">
                            <label class="form-check-label" for="batalPeriksa">Batal Periksa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pasienDirujuk" value="Pasien Dirujuk">
                            <label class="form-check-label" for="pasienDirujuk">Pasien Dirujuk</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="meninggal" value="Meninggal">
                            <label class="form-check-label" for="meninggal">Meninggal</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="dirawat" value="Dirawat">
                            <label class="form-check-label" for="dirawat">Dirawat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="pulangPaksak" value="Pulang Paksa">
                            <label class="form-check-label" for="pulangPaksak">Pulang Paksa</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="okButton">Ok</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="statusLanjutModal" tabindex="-1" role="dialog" aria-labelledby="statusLanjutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusLanjutModalLabel">Status Lanjut</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="step active" id="step1">
                    <p>Apakah Pasien Ingin Dimasukkan Dalam Kamar Inap?</p>
                </div>
                <div class="step" id="step2">
                    <form id="statusLanjutForm">
                        @csrf <!-- CSRF token -->
                            <input type="hidden"" class="form-control" id="statno_rm" name="statno_rm" readonly>
                            <input type="hidden"" class="form-control" id="stanama" name="stanama" readonly>
                            <input type="hidden"" class="form-control" id="poliid" name="poliid" readonly>
                            <input type="hidden"" class="form-control" id="doctorid" name="doctorid" readonly>
                            <input type="hidden"" class="form-control" id="penjabid" name="penjabid" readonly>
                            <input type="hidden"" class="form-control" id="alamat" name="alamat" readonly>
                            <input type="hidden"" class="form-control" id="statelepon" name="statelepon" readonly>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="tanggal_rawat">Tanggal Rawat</label>
                                <div class="input-group date" id="tanggal_rawat" data-target-input="nearest">
                                    <input type="text" id="tanggal_rawat" name="tanggal_rawat" class="form-control datetimepicker-input" data-target="#tanggal_rawat">
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
                            <div class="col-md-12">
                                <label for="nama_keluarga">Nama Keluarga</label>
                                <input type="text" class="form-control" id="nama_keluarga" name="nama_keluarga">
                            </div>
                            <div class="col-md-12">
                                <label for="alamat_penjamin">Alamat</label>
                                <input type="text" class="form-control" id="alamat_penjamin" name="alamat_penjamin">
                            </div>
                            <div class="col-md-5">
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
                            <div class="col-md-7 d-flex align-items-end">
                                <input type="text" class="form-control" id="no_kartu" name="no_kartu" placeholder="No. Kartu">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-secondary" id="prevButton">Previous</button>
                <button type="button" class="btn btn-primary" id="nextButton">Next</button>
                <button type="button" class="btn btn-primary" id="clearButton">Clear</button>
                <button type="button" class="btn btn-primary" id="saveButton">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Set up the CSRF token in the headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#statusLanjutModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var no_rm = button.data('norm'); // Extract info from data-* attributes
            var nama = button.data('nama'); // Extract info from data-* attributes
            var poliid = button.data('poliid'); // Extract info from data-* attributes
            var doctorid = button.data('doctorid'); // Extract info from data-* attributes
            var penjabid = button.data('penjabid'); // Extract info from data-* attributes
            var alamat = button.data('alamat'); // Extract info from data-* attributes
            var telepon = button.data('telepon'); // Extract info from data-* attributes

            // Update the modal's content.
            var modal = $(this);
            modal.find('.modal-body #statno_rm').val(no_rm);
            modal.find('.modal-body #stanama').val(nama);
            modal.find('.modal-body #poliid').val(poliid);
            modal.find('.modal-body #doctorid').val(doctorid);
            modal.find('.modal-body #penjabid').val(penjabid);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #statelepon').val(telepon);
        });

        var currentStep = 1;
        var totalSteps = $('.step').length;

        function showStep(step) {
            $('.step').hide();
            $('#step' + step).show();

            if (step === 1) {
                $('#prevButton').hide();
                $('#nextButton').show();
                $('#clearButton').hide();
                $('#saveButton').hide();
            } else if (step === totalSteps) {
                $('#prevButton').show();
                $('#nextButton').hide();
                $('#clearButton').hide();
                $('#saveButton').show();
            } else {
                $('#prevButton').show();
                $('#nextButton').show();
                $('#clearButton').show();
                $('#saveButton').hide();
            }
        }

        $('#nextButton').click(function() {
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            }
        });

        $('#prevButton').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        showStep(currentStep);

        // Tambahan: Reset form dan kembali ke langkah pertama
        $('#clearButton').click(function() {
            $('#statusLanjutForm')[0].reset(); // Reset form
            currentStep = 1; // Reset ke langkah pertama
            showStep(currentStep); // Tampilkan langkah pertama
        });

        $('#saveButton').on('click', function() {
            var modal = $('#statusLanjutModal');
            var formData = {
                _token: '{{ csrf_token() }}', // Include CSRF token
                no_rm: $('#statno_rm').val(),
                nama: $('#stanama').val(),
                poliid: $('#poliid').val(),
                doctorid: $('#doctorid').val(),
                penjabid: $('#penjabid').val(),
                alamat: $('#alamat').val(),
                telepon: $('#statelepon').val(),
                tanggal_rawat: $('#tanggal_rawat').find('input').val(), // Get value from datetimepicker input
                r_perawatan: $('#r_perawatan').val(),
                dokter_dpjb: $('#dokter_dpjb').val(),
                hub_pasien: $('#hub_pasien').val(),
                nama_keluarga: $('#nama_keluarga').val(),
                alamat_penjamin: $('#alamat_penjamin').val(),
                jenis_kartu: $('#jenis_kartu').val(),
                no_kartu: $('#no_kartu').val()
            };

            modal.modal('hide');

            $.ajax({
                url: '/regis/status-lanjut', // URL endpoint for saving data
                method: 'POST',
                data: $.param(formData), // Convert array to URL-encoded string
                success: function(response) {

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true
                    });

                    Toast.fire({
                        title: response.message,
                        icon: 'success',
                    });
                    location.reload(); // Reload the page to reflect changes

                },
                error: function (xhr, status, error) {
                    // Handle error response
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true
                    });

                    Toast.fire({
                        title: 'Gagal menyimpan data. Silakan coba lagi. isi semua data',
                        icon: 'error',
                    });
                }
            });
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
      $('#statusRawatModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var status = button.data('status'); // Extract info from data-* attributes
        var id = button.data('id');

        // Update the modal's content.
        var modal = $(this);
        modal.find('.modal-body #no_rm').val(id);

        // Set the radio button based on the status
        modal.find('.modal-body input[name="status"]').each(function () {
          if ($(this).val() === status) {
            $(this).prop('checked', true);
          } else {
            $(this).prop('checked', false);
          }
        });
      });

      // Handle the Ok button click event
      $('#okButton').on('click', function () {
        var modal = $('#statusRawatModal');
        var id = modal.find('.modal-body #no_rm').val();
        var status = modal.find('.modal-body input[name="status"]:checked').val();

            // Hide the modal immediately
        modal.modal('hide');
        // Send AJAX request to update the status
        $.ajax({
          url: '/regis/update-status', // Replace with your actual update URL
          method: 'POST',
          data: {
            _token: '{{ csrf_token() }}', // Include CSRF token
            id: id,
            status: status
          },
          success: function (response) {
            // Handle success response using SweetAlert
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true
            });

            Toast.fire({
              title: response.message,
              icon: 'success',
            });
            location.reload(); // Reload the page to reflect changes

          },
          error: function (xhr, status, error) {
            // Handle error response
            alert('Failed to update status. Please try again.');
          }
        });
      });
    });
</script>

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
            const searchButton = document.getElementById('search-button');
            const kecelakanSection = document.getElementById('kecelakan-section');
            const kecelakanHeader = document.getElementById('kecelakan-header');
            const kecelakanCard = document.getElementById('kecelakan-card');
            const kecelakanCol = document.getElementById('kecelakan-col');

            // Event listener ketika tombol search diklik
            $('#search-button').click(function() {
                // Ambil nilai dari input nama
                var namaPasien = $('#nama').val();

                // Panggil AJAX ke server untuk mencari pasien
                $.ajax({
                    url: '/search-pasien-rajal', // URL untuk request pencarian
                    method: 'GET',
                    data: { nama: namaPasien },
                    success: function(response) {
                        // Kosongkan tabel sebelum mengisi data baru
                        $('#patienttbl tbody').empty();

                        // Periksa apakah ada hasil
                        if (response.length > 0) {
                            // Looping melalui hasil dan tambahkan ke tabel
                            $.each(response, function(index, pasien) {
                                var row = '<tr>' +
                                    '<td>' + pasien.no_rm + '</td>' +
                                    '<td>' + pasien.nama + '</td>' +
                                    '<td>' + pasien.tanggal_lahir + '</td>' +
                                    '<td>' + (pasien.seks ? pasien.seks.nama : 'Tidak Diketahui') + '</td>' +  // Menampilkan nama seks, jika tersedia
                                    '<td>' + pasien.Alamat + '</td>' +
                                    '<td>' + pasien.telepon + '</td>' +
                                    '<td>' +
                                        '<button class="btn btn-primary select-patient" data-id="' + pasien.no_rm + '" data-nama="' + pasien.nama + '" data-tgl="' + pasien.tanggal_lahir + '" data-seks="' + (pasien.seks ? pasien.seks.nama : '') + '" data-telepon="' + pasien.telepon + '">Pilih</button>' +
                                    '</td>' +
                                    '</tr>';
                                $('#patienttbl tbody').append(row);
                            });
                        } else {
                            // Jika tidak ada hasil, tampilkan pesan kosong
                            $('#patienttbl tbody').append('<tr><td colspan="7">Pasien tidak ditemukan</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error searching pasien:', error);
                    }
                });

                // Tampilkan atau sembunyikan kecelakanSection
                const isCurrentlyVisible = kecelakanSection.style.display === 'block';

                if (isCurrentlyVisible) {
                    // Sembunyikan jika sedang terlihat
                    kecelakanSection.style.display = 'none';
                    kecelakanHeader.style.display = 'none';
                    kecelakanCard.style.display = 'none';
                    kecelakanCol.style.display = 'none';
                } else {
                    // Tampilkan jika sedang tersembunyi
                    kecelakanSection.style.display = 'block';
                    kecelakanHeader.style.display = 'block';
                    kecelakanCard.style.display = 'block';
                    kecelakanCol.style.display = 'block';
                }
            });

            // Event listener untuk tombol "Pilih"
            $(document).on('click', '.select-patient', function() {
                // Ambil data dari atribut tombol
                var noRm = $(this).data('id');
                var nama = $(this).data('nama');
                var tglLahir = $(this).data('tgl');
                var seks = $(this).data('seks');
                var telepon = $(this).data('telepon');

                // Isi field input di card dengan data pasien yang dipilih
                $('#no_rm').val(noRm);
                $('#nama_pasien').val(nama);
                $('#tgl_lahir').val(tglLahir);
                $('#seks').val(seks);
                $('#telepon').val(telepon);

                // Sembunyikan kecelakanSection dan elemen terkait
                kecelakanSection.style.display = 'none';
                kecelakanHeader.style.display = 'none';
                kecelakanCard.style.display = 'none';
                kecelakanCol.style.display = 'none';
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Menjalankan AJAX saat input No. Reg difokuskan (diklik)
            $('#no_reg').focus(function() {
                $.ajax({
                    url: '/generate-no-reg-rajal', // URL ke controller yang menangani nomor registrasi
                    type: 'GET',
                    success: function(response) {
                        // Menampilkan nomor registrasi di input field
                        $('#no_reg').val(response.no_reg);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Gagal menghasilkan nomor registrasi.');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Menjalankan AJAX saat input No. Rawat difokuskan (diklik)
            $('#no_rawat').focus(function() {
                $.ajax({
                    url: '/generate-no-rawat-rajal', // URL ke route yang menggenerate nomor rawat
                    method: 'GET',
                    success: function(response) {
                        // Set nilai input dengan nomor rawat yang dihasilkan
                        $('#no_rawat').val(response.no_rawat);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error generating No. Rawat:', error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#generate-no-rawat-button').click(function() {
                $.ajax({
                    url: '/generate-no-rawat', // URL yang mengarah ke route untuk generate nomor rawat
                    method: 'GET',
                    success: function(response) {
                        // Set nilai input dengan nomor rawat yang dihasilkan
                        $('#no_rawat').val(response.no_rawat);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error generating No. Rawat:', error);
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#patient-visit-table").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": true,
                "lengthChange": true,
                "buttons": ["csv", "excel", "pdf", "print"],
                "language": {
                    "lengthMenu": "Tampil  _MENU_",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ entri",
                    "search": "Cari :",
                    "paginate": {
                        "previous": "Sebelumnya",
                        "next": "Berikutnya"
                    }
                }
            }).buttons().container().appendTo('#doctortbl_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
