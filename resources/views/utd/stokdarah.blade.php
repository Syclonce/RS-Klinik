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
                                        <a class="nav-link px-3" id="custom-tabs-two-profile-tab" href="{{ route('utd.datadonor') }}" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Data Donor</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active px-3" id="custom-tabs-two-messages-tab" href="{{ route('utd.stokdarah') }}" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="true">Stok Darah</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-two-tabContent">
                                <!-- Tab Stok Darah Content -->
                                <div class="tab-pane fade show active" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
                                    <div class="col-md-12 mb-3">
                                        <form id="addFormpermesion" action="{{ route('utd.stokdarah.add') }}" method="POST">
                                            @csrf
                                        <!-- Form Group for Date -->
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="no_kantong">Nomor Kantong</label>
                                                <input type="text" class="form-control" id="no_kantong" name="no_kantong">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kode">Kode Komponen</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="kode" name="kode">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($komda as $data)
                                                            <option value="{{$data->id}}">{{$data->kode}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="goldar">Golongan Darah</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="goldar" name="goldar">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                        @foreach ($goldar as $data)
                                                            <option value="{{$data->id}}">{{$data->nama}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="resus">Resus</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="resus" name="resus">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="positif">Positif</option>
                                                    <option value="negatif">Negatif</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tgl_aftap">Tanggal Aftap</label>
                                                <input type="date" class="form-control" id="tgl_aftap" name="tgl_aftap">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="tgl_kadaluarsa">Tanggal Kadaluarsa</label>
                                                <input type="date" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="asal_darah">Asal Darah</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="asal_darah" name="asal_darah">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="hibah">Hibah</option>
                                                    <option value="beli">Beli</option>
                                                    <option value="produksi sendiri">Produksi Sendiri</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="status">Status</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="status" name="status">
                                                    <option value="" disabled selected>Silahkan Pilih</option>
                                                    <option value="ada">Ada</option>
                                                    <option value="diambil">Diambil</option>
                                                    <option value="dimusnahkan">Dimusnahkan</option>
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
                            <h3 class="card-title mb-0">UTD - Stok Darah</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="patient-visit-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No. Kantong</th>
                                        <th>Kode Komponen</th>
                                        <th>Gol. Darah</th>
                                        <th>Resus</th>
                                        <th>Tanggal Aftap</th>
                                        <th>Tanggal kadaluarsa</th>
                                        <th>Asal Darah</th>
                                        <th>Status</th>
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stokda as $data)
                                            <tr>
                                                <td>{{ $data->no_kantong }}</td>
                                                <td>{{ $data->komda->kode }}</td>
                                                <td>{{ $data->goldar->nama }}</td>
                                                <td>{{ $data->resus }}</td>
                                                <td>{{ $data->tgl_aftap }}</td>
                                                <td>{{ $data->tgl_kadaluarsa }}</td>
                                                <td>{{ $data->asal_darah }}</td>
                                                <td>{{ $data->status }}</td>
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
