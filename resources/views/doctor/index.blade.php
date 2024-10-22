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
                            <h3 class="mb-0 card-title">Dokter</h3>
                            <div class="text-right card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddoctor">
                                    <i class="fas fa-plus"></i> Tambah Baru
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="doctortbl" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Poli</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Pekerja</th>
                                        <th width="20%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Uncomment this to display doctors --}}
                                    @foreach ($doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->nik }}</td>
                                            <td>{{ $doctor->nama }}</td>
                                            <td>{{ $doctor->jabatan->nama }}</td>
                                            <td>{{ $doctor->poli->nama_poli }}</td>
                                            <td>{{ $doctor->seks }}</td>
                                            <td>{{ $doctor->statdok->nama }}</td>
                                            <td></td>
                                            {{-- <td>
                                                <a href="{{ route('doctor.doctor', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('doctor.doctor.liburan', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion">
                                                    <i class="fa fa-edit text-secondary"></i>
                                                </a>
                                            </td> --}}
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

<!-- Modal for Add Doctor -->
<div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('doctor.add') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nik" name="nik" required oninput="cekSatuSehat()">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nama </label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jabatan </label>
                                <select class="form-control select2bs4"  style="width: 100%;"  id="jabatan" name="jabatan">
                                    <option value="" disabled selected>--- Pilih Jabatan ---</option>
                                    @foreach ($jabatan as $jabatan)
                                    <option value="{{$jabatan->id}}">{{$jabatan->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Status Aktivasi </label>
                                <select class="form-control select2bs4" style="width: 100%;" id="aktivasi" name="aktivasi">
                                    <option value="">--- pilih ---</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Poli</label>
                                <select class="form-control select2bs4"  style="width: 100%;"  id="poli" name="poli">
                                    <option value="" disabled selected>--- Pilih Poli ---</option>
                                    @foreach ($poli as $poli)
                                    <option value="{{$poli->id}}">{{$poli->nama_poli}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tglawal" name="tglawal" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" id="Alamat" name="Alamat" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Seks</label>
                                <select class="form-control select2bs4" style="width: 100%;" id="seks" name="seks">
                                    @foreach ($sex as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>SIP *</label>
                                <input type="text" class="form-control" id="sip" name="sip" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>STR *</label>
                                <input type="text" class="form-control" id="str" name="str" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>NPWP </label>
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgllahir" name="tgllahir" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Status Pekerja</label>
                                <select class="form-control select2bs4"  style="width: 100%;"  id="status_kerja" name="status_kerja">
                                    <option value="" disabled selected>--- Pilih Status ---</option>
                                    @foreach ($status as $status)
                                    <option value="{{$status->id}}">{{$status->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>ID Satu Sehat</label>
                                <input type="text" class="form-control" id="kode" name="kode" readonly>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Kode BPJS</label>
                                <input type="text" class="form-control" id="kode_bpjs" name="kode_bpjs" readonly>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Username </label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="Email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete >
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button> <!-- Submit button -->
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function cekSatuSehat(attempts = 0) {
        var jenisKartu = $('#nik').val();
        if (jenisKartu.length === 16) {
            $.ajax({
                url: '/practitionejenisKartu/' + jenisKartu,
                method: 'GET',
                success: function(response) {
                    if (response && response.patient_data && response.patient_data.entry && response.patient_data.entry.length > 0) {
                        var data = response.patient_data.entry[0].resource; // Perbaikan di sini
                        var Nama = data.name[0] ? data.name[0].text : 'Nama Dokter tidak tersedia';
                        var TglLahir = data.birthDate || 'Tanggal Lahir tidak tersedia';
                        var Sex = data.gender || 'Jenis Kelamin tidak tersedia';
                        var Id = data.id || 'ID Satu Sehat tidak tersedia';

                        var Namas = $('#nama').val();
                        $.ajax({
                            url: '/search-matching-names/' + Namas , // Update this URL to match your route
                            type: 'GET',                           
                            success: function(response) {
                                if (response) {
                                    consol.log(response);
                                } else {
                                    $('#nama').val('Tidak ditemukan');                                    
                                }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText);
                            }
                        });


                        $('#nama').val(Nama);
                        $('#tgllahir').val(TglLahir);
                        $('#kode').val(Id);
                    } else if (attempts < 3) {
                        cekSatuSehat(attempts + 1);
                    } else {
                        $('#nama').val('Tidak ditemukan');
                        $('#tgllahir').val('Tidak ditemukan');
                        $('#kode').val('Tidak ditemukan');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                    if (attempts < 3) {
                        cekSatuSehat(attempts + 1);
                    } else {
                        alert('Jaringan BPJS mungkin tidak stabil. Silahkan coba kembali.');
                    }
                }
            });
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("#doctortbl").DataTable({
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
