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
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title pl-3">Unit Tambah Darah</h3>
                                <ul class="nav nav-tabs ml-auto" id="custom-tabs-two-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3" id="custom-tabs-two-home-tab" href="{{ route('utd') }}" role="tab" aria-controls="custom-tabs-two-home" aria-selected="false">Data Pendonor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active px-3" id="custom-tabs-two-profile-tab" href="{{ route('utd.datadonor') }}" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="true">Data Donor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" id="custom-tabs-two-messages-tab" href="{{ route('utd.stokdarah') }}" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Stok Darah</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <!-- Tab Data Donor Content -->
                                <div class="tab-pane fade show active" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                                    <div class="col-md-12 mb-3">
                                        <form id="addFormpermesion" action="{{ route('utd.datadonor.add') }}" method="POST">
                                            @csrf
                                        <!-- Form Group for Date -->
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="no_donor">Nomor Donor</label>
                                                <input type="text" class="form-control" id="no_donor" name="no_donor">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="nama_pendonor">Nama Pendonor</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="nama_pendonor" name="nama_pendonor">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($pendonor as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="tensi">Tensi</label>
                                                <input type="text" class="form-control" id="tensi" name="tensi">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="hbsag">HBSAG</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="hbsag" name="hbsag">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="tgl">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="dinas">Dinas</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="dinas" name="dinas">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="pagi">Pagi</option>
                                                    <option value="siang">Siang</option>
                                                    <option value="sore">Sore</option>
                                                    <option value="malam">Malam</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="hcv">HCV</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="hcv" name="hcv">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="hiv">HIV</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="hiv" name="hiv">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="no_bag">Nomor Bag</label>
                                                <input type="text" class="form-control" id="no_bag" name="no_bag">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="jenis_bag">Jenis Bag</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="jenis_bag" name="jenis_bag">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="single bag">SB</option>
                                                    <option value="double bag">DB</option>
                                                    <option value="triple bag">TB</option>
                                                    <option value="quadruple bag">QB</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="jenis_donor">Jenis Donor</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="jenis_donor" name="jenis_donor">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="DB">DB</option>
                                                    <option value="DP">DP</option>
                                                    <option value="DS">DS</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="sipilis">Sipilis</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="sipilis" name="sipilis">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="malaria">Malaria</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="malaria" name="malaria">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label for="tempat">Tempat Aftap</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="tempat" name="tempat">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="dalam gedung">Dalam Gedung</option>
                                                    <option value="luar gedung">Luar Gedung</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="petugas_aftap">Petugas Aftap</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="petugas_aftap" name="petugas_aftap">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($dokter as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="petugas_saring">Petugas Saring</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="petugas_saring" name="petugas_saring">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($dokter as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="status">Status</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="aman">Aman</option>
                                                    <option value="cekal">Cekal</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row justify-content-center" style="margin-top: 30px;"> <!-- Menambahkan margin-top langsung -->
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white; border: none; transition: background-color 0.3s;" id="clear-form-button">
                                                <i class="fas fa-trash-alt" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #ff851b; color: white; border: none; transition: background-color 0.3s;" id="print-button">
                                                <i class="fas fa-print" style="color: white;"></i> Print
                                            </button>
                                            <button type="submit" class="btn btn-light mr-2" style="background-color: #28a745; color: white; border: none; transition: background-color 0.3s;">
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



                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">UTD - Data Donor</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <div class="table-responsive"> <!-- Membuat tabel responsif -->
                                <table id="patient-visit-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Donor</th>
                                            <th>Nama Pendonor</th>
                                            <th>Nomor Pendonor</th>
                                            <th>No. Telepon</th>
                                            <th>Tanggal Donor</th>
                                            <th>Dinas</th>
                                            <th>Tensi</th>
                                            <th>Nomor Bag</th>
                                            <th>Jenis Bag</th>
                                            <th>Jenis Donor</th>
                                            <th>Tempat Aftap</th>
                                            <th>Petugas Aftap</th>
                                            <th>HBSAG</th>
                                            <th>HCV</th>
                                            <th>HIV</th>
                                            <th>Malaria</th>
                                            <th>Petugas Saring</th>
                                            <th>Status</th>
                                            <th width="5%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datadonor as $data)
                                            <tr>
                                                <td>{{ $data->no_donor }}</td>
                                                <td>{{ $data->datapendor->nama }}</td>
                                                <td>{{ $data->datapendor->no_pendonor }}</td>
                                                <td>{{ $data->datapendor->telepon }}</td>
                                                <td>{{ $data->tgl_donor }}</td>
                                                <td>{{ $data->dinas }}</td>
                                                <td>{{ $data->tensi }}</td>
                                                <td>{{ $data->no_bag }}</td>
                                                <td>{{ $data->jenis_bag }}</td>
                                                <td>{{ $data->jenis_donor }}</td>
                                                <td>{{ $data->tempat }}</td>
                                                <td>{{ $data->doctor_raftap->nama }}</td>
                                                <td>{{ $data->hbsag }}</td>
                                                <td>{{ $data->hcv }}</td>
                                                <td>{{ $data->hiv }}</td>
                                                <td>{{ $data->malaria }}</td>
                                                <td>{{ $data->doctor_saring->nama }}</td>
                                                <td>{{ $data->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        $("#patient-visit-table").DataTable({
            "responsive": true,
            "autoWidth": false,
            "lengthChange": true,
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
