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
                    <div class="card card-lightblue card-tabs">
                        <div class="card-header p-0 pt-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title pl-3">Unit Tambah Darah</h3>
                                <ul class="nav nav-tabs ml-auto" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active px-3" id="custom-tabs-two-home-tab" href="{{ route('utd') }}" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Data Pendonor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" id="custom-tabs-two-profile-tab" href="{{ route('utd.datadonor') }}" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Data Donor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" id="custom-tabs-two-messages-tab" href="{{ route('utd.stokdarah') }}" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Stok Darah</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <!-- Tab Home Content -->
                                <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                    <div class="col-md-12 mb-3">
                                        <form id="addFormpermesion" action="{{ route('utd.add') }}" method="POST">
                                            @csrf
                                        <!-- Form Group for Date and Time -->
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="no_pendonor">Nomor Pendonor</label>
                                                <input type="text" class="form-control" id="no_pendonor" name="no_pendonor" placeholder="Generate dengan button" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-info btn-block" id="generate-no-pendonor-button">Generate</button>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama">Nama Pendonor</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="ktp">Nomor KTP</label>
                                                <input type="text" class="form-control" id="ktp" name="ktp">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="telepon">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="seks">Jenis Kelamin</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="seks" name="seks">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($seks as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="goldar">Golongan Darah</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="goldar" name="goldar">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($goldar as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="resus">Resus</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="resus" name="resus">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="Alamat">Alamat</label>
                                                <textarea class="form-control" id="Alamat" name="Alamat" rows="3" placeholder="Masukkan alamat di sini..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="form-control select2bs4" style="width: 100%;" id="provinsi" name="provinsi">
                                                        <option value="" disabled selected>Provinsi</option>
                                                        @foreach ($provinsi as $provinsi)
                                                            <option value="{{$provinsi->kode}}">{{$provinsi->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="form-control select2bs4" style="width: 100%;" id="kota_kabupaten" name="kota_kabupaten">
                                                        <option value="" disabled selected>Kota/Kabupaten</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="form-control select2bs4" style="width: 100%;" id="kecamatan" name="kecamatan">
                                                        <option value="" disabled selected>Kecamatan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <select class="form-control select2bs4" style="width: 100%;" id="desa" name="desa">
                                                        <option value="" disabled selected>Desa/Kelurahan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- New buttons for adding, deleting, and printing -->
                                        <div class="form-group row justify-content-center">
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white; border: none; transition: background-color 0.3s;" id="clear-form-button">
                                                <i class="fas fa-trash-alt" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #ff851b; color: white; border: none; transition: background-color 0.3s;" id="print-button">
                                                <i class="fas fa-print" style="color: white;"></i> Print
                                            </button>
                                            <button type="submit" class="btn btn-light" style="background-color: #28a745; color: white; border: none; transition: background-color 0.3s;">
                                                <i class="fas fa-save" style="color: white;"></i> Save
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">UTD - Data Pendonor</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="patient-visit-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Pendonor</th>
                                        <th>Nama Pendonor</th>
                                        <th>Nomor KTP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Gol. Darah</th>
                                        <th>Resus</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Desa/Keluraha</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten/Kota</th>
                                        <th>Provinsi</th>
                                        <th>Telepon</th>
                                        <th width="5%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapendor as $data)
                                            <tr>
                                                <td>{{ $data->no_pendonor }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->no_ktp }}</td>
                                                <td>{{ $data->seks->nama }}</td>
                                                <td>{{ $data->goldar->nama }}</td>
                                                <td>{{ $data->resus }}</td>
                                                <td>{{ $data->tmp_lahir }}</td>
                                                <td>{{ $data->tgl_lahir }}</td>
                                                <td>{{ $data->alamat }}</td>
                                                <td>{{ $data->desa->name }}</td>
                                                <td>{{ $data->kecamatan->name }}</td>
                                                <td>{{ $data->kabupaten->name }}</td>
                                                <td>{{ $data->provinsi->name }}</td>
                                                <td>{{ $data->telepon }}</td>
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
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        $('#generate-no-pendonor-button').click(function() {
            $.ajax({
                url: '{{ route('utd.generateNoPendonor') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Tambahkan token CSRF untuk Laravel
                },
                success: function(response) {
                    $('#no_pendonor').val(response.no_pendonor); // Mengisi input dengan nomor pendonor baru
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Trigger change event when user selects a provinsi
        $('#provinsi').on('change', function() {
            var kodeProvinsi = $(this).val();

            // Clear previous options in kota_kabupaten, kecamatan, and desa select boxes
            $('#kota_kabupaten').empty().append('<option value="" disabled selected>Kota/Kabupaten</option>');
            $('#kecamatan').empty().append('<option value="" disabled selected>Kecamatan</option>');
            $('#desa').empty().append('<option value="" disabled selected>Desa</option>');

            if (kodeProvinsi) {
                $.ajax({
                    url: '{{ route("utd.wilayah.getKabupaten") }}', // Route to fetch kabupaten
                    type: 'GET',
                    data: { kode_provinsi: kodeProvinsi },
                    success: function(response) {
                        $.each(response, function(index, kabupaten) {
                            $('#kota_kabupaten').append('<option value="' + kabupaten.kode + '">' + kabupaten.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching kabupaten:', error);
                    }
                });
            }
        });

        // Trigger change event when user selects a kabupaten
        $('#kota_kabupaten').on('change', function() {
            var kodeKabupaten = $(this).val();

            // Clear previous options in kecamatan and desa select boxes
            $('#kecamatan').empty().append('<option value="" disabled selected>Kecamatan</option>');
            $('#desa').empty().append('<option value="" disabled selected>Desa</option>');

            if (kodeKabupaten) {
                $.ajax({
                    url: '{{ route("utd.wilayah.getKecamatan") }}', // Route to fetch kecamatan
                    type: 'GET',
                    data: { kode_kabupaten: kodeKabupaten },
                    success: function(response) {
                        $.each(response, function(index, kecamatan) {
                            $('#kecamatan').append('<option value="' + kecamatan.kode + '">' + kecamatan.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching kecamatan:', error);
                    }
                });
            }
        });

        // Trigger change event when user selects a kecamatan
        $('#kecamatan').on('change', function() {
            var kodeKecamatan = $(this).val();

            // Clear previous options in desa select box
            $('#desa').empty().append('<option value="" disabled selected>Desa</option>');

            if (kodeKecamatan) {
                $.ajax({
                    url: '{{ route("utd.wilayah.getDesa") }}', // Route to fetch desa
                    type: 'GET',
                    data: { kode_kecamatan: kodeKecamatan },
                    success: function(response) {
                        $.each(response, function(index, desa) {
                            $('#desa').append('<option value="' + desa.kode + '">' + desa.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching desa:', error);
                    }
                });
            }
        });
    });
</script>

<script>
    // JavaScript for clearing the form
    document.getElementById('clear-form-button').addEventListener('click', function() {
        document.getElementById('no_pendonor').value = '';
        document.getElementById('nama').value = '';
        document.getElementById('ktp').value = '';
        document.getElementById('telepon').value = '';
        document.getElementById('tempat_lahir').value = '';
        document.getElementById('tanggal_lahir').value = '';
        document.getElementById('seks').selectedIndex = 0;
        document.getElementById('goldar').selectedIndex = 0;
        document.getElementById('resus').selectedIndex = 0;
        document.getElementById('Alamat').value = '';
        document.getElementById('provinsi').selectedIndex = 0;
        document.getElementById('kota_kabupaten').selectedIndex = 0;
        document.getElementById('kecamatan').selectedIndex = 0;
        document.getElementById('desa').selectedIndex = 0;
    });

    // JavaScript for printing (basic example)
    document.getElementById('print-button').addEventListener('click', function() {
        window.print();
    });
</script>

<script>
    $(document).ready(function() {
        $("#patient-visit-table").DataTable({
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
