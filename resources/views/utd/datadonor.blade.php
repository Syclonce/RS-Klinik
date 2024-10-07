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
                                        <!-- Form Group for Date -->
                                        <div class="form-group row">
                                            <div class="col-md-7">
                                                <label for="tgl_kunjungan">Tanggal Donor</label>
                                                <input type="date" class="form-control" id="tgl_kunjungan" name="tgl_kunjungan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary btn-block" style="max-width: 500px;">Kirim ke Laboratorium</button>
                    </div>
                </div>



                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Pasien - Laboratorium</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body" id="kunjungan-section">
                            <table id="patient-visit-table" class="table table-bordered table-striped">
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
                                        <th>Stts. Periksa</th>
                                        <th>Stts. Lanjut</th>
                                        <th>Stts. Bayar</th>
                                        <th width="10%">Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($lab as $data)
                                            <tr>
                                                <td>{{ $data->no_rm }}</td>
                                                <td>{{ $data->nama_pasien }}</td>
                                                <td>{{ $data->no_rawat }}</td>
                                                <td>{{ $data->no_reg }}</td>
                                                <td>{{ $data->doctor->poli->nama_poli }}</td>
                                                <td>{{ $data->doctor->nama }}</td>
                                                <td>{{ $data->penjab->pj }}</td>
                                                <td>{{ $data->pasien->no_bpjs }}</td>
                                                <td>{{ $data->tgl_kunjungan }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach --}}
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


@endsection
