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
                                <h3 class="mb-0 card-title">Pasien</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="patienttbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor RM</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Golongan Darah</th>
                                            <th>Telepon</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pasien as $pasien)
                                            <tr>
                                                <td>{{ $pasien->id }}</td>
                                                <td>{{ $pasien->no_rm }}</td>
                                                <td>{{ $pasien->nama }}</td>
                                                <td>{{ $pasien->Alamat }}</td>
                                                <td>{{ $pasien->goldar->nama }}</td>
                                                <td>{{ $pasien->telepon }}</td>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('patient.add') }}" method="POST">
                        @csrf
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Pertama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Kedua</a>
                        </li>
                        </ul>
                        <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nomor RM</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nomor_rm" name="nomor_rm" placeholder="Enter or generate Nomor RM" readonly>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary" onclick="generateNomorRM()">Generate</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nik" name="nik" oninput="cekniksth()">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-primary" onclick="ceknikBPJS()">Cek BPJS</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>IHS Pasien</label>
                                        <input type="text" class="form-control" id="kode_ihs" name="kode_ihs" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nama </label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tanggal_lahir" name="tanggal_lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Nomor BPJS</label>
                                        <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" >
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Tanggal Akhir Berlaku</label>
                                        <input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" >
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="Email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Password </label>
                                        <input type="password" class="form-control" id="password" name="password" autocomplete >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <input type="text" class="form-control" placeholder="Alamat" id="Alamat" name="Alamat">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>RT </label>
                                        <input type="text" class="form-control" placeholder="001" id="rt" name="rt">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>RW </label>
                                        <input type="text" class="form-control" placeholder="002" id="rw" name="rw">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>Kode Pos </label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Kewarganegaraan </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="kewarganegaraan" name="kewarganegaraan">
                                            <option value="">--- pilih ---</option>
                                            <option value="wni">Warga Negara Indonesia</option>
                                            <option value="wna">Warga Negara Asing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="provinsi" name="provinsi">
                                            <option value="" disabled selected>Provinsi</option>
                                            @foreach ($provinsi as $provinsi)
                                            <option value="{{$provinsi->kode}}">{{$provinsi->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="kota_kabupaten" name="kota_kabupaten">
                                            <option value="" disabled selected>Kota/Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="kecamatan" name="kecamatan">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="seks" name="seks">
                                            @foreach ($sex as $data)
                                                <option value="{{$data->id}}">{{$data->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Agama </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="agama" name="agama">
                                            <option value="">--- pilih ---</option>
                                            <option value="islam">Islam</option>
                                            <option value="katolik">Kristen Katolik</option>
                                            <option value="protestan">Kristen Protestan</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Buddha</option>
                                            <option value="khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pendidikan </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="pendidikan" name="pendidikan">
                                            <option value="">--- pilih ---</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma">SMA</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="s1">Sarjana</option>
                                            <option value="s2">Magister</option>
                                            <option value="s3">Doctoral Degree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan Darah </label>
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="goldar" name="goldar">
                                            @foreach ($goldar as $goldar)
                                            <option value="{{$goldar->id}}">{{$goldar->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Status Pernikahan </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="pernikahan" name="pernikahan">
                                            <option value="">--- pilih ---</option>
                                            <option value="menikah">Menikah</option>
                                            <option value="belum_nikah">Belum Menikah</option>
                                            <option value="cerai_hidup">Cerai Hidup</option>
                                            <option value="cerai_mati">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Pekerjaan </label>
                                        <select class="form-control select2bs4" style="width: 100%;" id="pekerjaan" name="pekerjaan">
                                            <option value="">--- pilih ---</option>
                                            <option value="wirausaha">Wirausaha</option>
                                            <option value="tidak_bekerja">Tidak Bekerja</option>
                                            <option value="pns">PNS</option>
                                            <option value="tni_polri">TNI/Polri</option>
                                            <option value="bumn">BUMN</option>
                                            <option value="swasta">Pegawai Swasta</option>
                                            <option value="lain_lain">Lain - lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Telepon  </label>
                                        <input type="text" class="form-control" id="telepon" name="telepon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                            <div class="row">
                                {{-- <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nama </label>
                                        <input type="text" class="form-control" id="nama" name="nama" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Nomor BPJS</label>
                                        <input type="text" class="form-control" id="no_bpjs" name="no_bpjs" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Tanggal Akhir Berlaku</label>
                                        <input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>COB</label>
                                        <input type="text" class="form-control" id="cob" name="cob" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Kode Asuransi</label>
                                        <input type="text" class="form-control" id="kd_asuransi" name="kd_asuransi" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Asuransi</label>
                                        <input type="text" class="form-control" id="nm_asuransi" name="nm_asuransi" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Asuransi</label>
                                        <input type="text" class="form-control" id="no_asuransi" name="no_asuransi" disabled>
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
    </div>

<script>
   function cekniksth(attempts = 0) {
        var jenisKartus = document.getElementById('nik').value;
        // Periksa jika input memiliki 16 atau lebih karakter
        if (jenisKartus.length >= 16) {
            $.ajax({
                url: '/getsatusehat/' + jenisKartus,
                method: 'GET', // Use 'POST' if your server expects POST requests
                success: function(response) {
                    if (response && response.patient_data.entry.length > 0) {
                        var patient = response.patient_data.entry[0].resource;
                        var id = patient.id;
                        // Tampilkan hasil ke input IHS dan Nama
                        $('#kode_ihs').val(id);
                    } else if (attempts < 3) {
                        // Retry if the response data is not as expected
                        cekniksth(attempts + 1);
                    } else {
                        // Handle case when data is still not found after 3 attempts
                        $('#kode_ihs').val('Tidak ditemukan');
                    }
                },
                error: function(xhr, status, error) {
                    // Retry if there is an error and attempts are less than 3
                    if (attempts < 3) {
                        cekniksth(attempts + 1);
                    } else {
                        // Handle error case after 3 attempts
                        console.error('Error:', status, error);
                        $('#kode_ihs').val('Error');
                        alert('Jaringan BPJS mungkin tidak stabil Silahkan Coba Kembali');
                    }
                }
            });
        }
    }

    function ceknikBPJS(attempts = 0) {
    var jenisKartu = document.getElementById('nik').value;

        $.ajax({
            url: '/jenisKartu/' + jenisKartu,
            method: 'GET', // Gunakan 'POST' jika server mengharapkan permintaan POST
            success: function(response) {
                if (response && response.data && response.data.aktif === true) {
                    // Pastikan data ada dan 'aktif' bernilai true
                    var datas = response.data;
                    var name = datas.nama || 'Nama tidak tersedia';
                    var tglLahir = datas.tglLahir || 'Tanggal Lahir tidak tersedia';
                    var noBPJS = datas.noKartu || 'No BPJS tidak tersedia';
                    var kadaluarsa = datas.tglAkhirBerlaku || 'Tanggal Akhir Berlaku tidak tersedia';

                    // Set nilai form dengan data yang didapat dari server
                    $('#nama').val(name);
                    $('#tanggal_lahir').val(tglLahir);
                    $('#no_bpjs').val(noBPJS);
                    $('#tgl_akhir').val(kadaluarsa);

                } else if (attempts < 3) {
                    // Jika data tidak valid, coba lagi hingga 3 kali
                    setTimeout(function() {
                        ceknikBPJS(attempts + 1); // Tambahkan jeda sebelum mencoba lagi
                    }, 1000); // Coba lagi setelah 1 detik

                } else {
                    // Jika setelah 3 kali percobaan tetap gagal
                    handleError();
                    alert('Jaringan BPJS mungkin tidak stabil. Silahkan coba kembali.');
                }
            },
            error: function(xhr, status, error) {
                if (attempts < 3) {
                    // Jika gagal, coba lagi hingga 3 kali
                    setTimeout(function() {
                        ceknikBPJS(attempts + 1); // Tambahkan jeda sebelum mencoba lagi
                    }, 1000); // Coba lagi setelah 1 detik
                } else {
                    // Jika setelah 3 kali percobaan tetap gagal
                    handleError();
                    alert('Jaringan BPJS mungkin tidak stabil. Silahkan coba kembali.');
                }
            }
        });
    }

    function handleError() {
        // Fungsi untuk menangani kesalahan dengan mengatur nilai form
        $('#tanggal_lahir').val('Tidak ditemukan');
        $('#no_bpjs').val('Tidak ditemukan');
        $('#tgl_akhir').val('Tidak ditemukan');
    }


    // function getSexDescription(Sex) {
    //     $.ajax({
    //         url: '/check-sex',  // Endpoint untuk memeriksa kode Sex di database
    //         type: 'POST',
    //         data: {
    //             sex_code: Sex,
    //             _token: '{{ csrf_token() }}' // Jangan lupa sertakan token CSRF untuk Laravel
    //         },
    //         success: function(response) {
    //             // Tampilkan deskripsi sex ke input field #seks
    //             $('#seks').val(response.description);
    //         },
    //         error: function(xhr) {
    //             // Jika gagal, tampilkan error
    //             $('#seks').val('Deskripsi tidak ditemukan');
    //             console.error('Error:', xhr.responseJSON.message);
    //         }
    //     });
    // }
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
                        url: '{{ route("wilayah.getKabupaten") }}', // Route to fetch kabupaten
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
                        url: '{{ route("wilayah.getKecamatan") }}', // Route to fetch kecamatan
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
                        url: '{{ route("wilayah.getDesa") }}', // Route to fetch desa
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
        function generateNomorRM() {
    fetch('/patient/generate-nomor-rm')
        .then(response => response.json())
        .then(data => {
            document.getElementById('nomor_rm').value = data.nomor_rm;
        })
        .catch(error => console.error('Error:', error));
    }
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
