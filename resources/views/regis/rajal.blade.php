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
                        <div class="row">
                            <!-- Identitas Pasien -->
                            <div class="col-md-6">
                                <div class="card h-100 w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Identitas Pasien</h5>
                                    </div>
                                    <div class="card-body">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="no_rm">No RM</label>
                                                    <select id="no_rm" name="no_rm" class="form-control">
                                                        <option value="">--- Cari RM ---</option>
                                                        <!-- Add options dynamically -->
                                                    </select>
                                                </div>
                                                <div class="col-md-4 d-flex align-items-end">
                                                    <button type="button" class="btn btn-primary mr-2">Cari RM</button>
                                                    <button type="button" class="btn btn-success">Pasien Baru</button>
                                                </div>
                                            </div>

                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="ktp">No KTP</label>
                                                <input type="text" class="form-control" id="ktp" name="ktp" placeholder="No KTP">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="satusehat" name="satusehat" placeholder="No Satusehat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-10">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur Saat Ini">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Poli Tujuan -->
                            <div class="col-md-6">
                                <div class="card h-100 w-100">
                                    <div class="card-header bg-light">
                                        <h5><i class="fa fa-user"></i> Poli Tujuan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="tglpol">Tanggal</label>
                                                <input type="date" class="form-control" id="tglpol" name="tglpol">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="poli">Pilih Poli</label>
                                                <select id="poli" name="poli" class="form-control">
                                                    <option value="">--- Pilih Poli ---</option>
                                                    <option value="poli gigi">Poli Gigi</option>
                                                    <option value="poli khitan">Poli Khitan</option>
                                                    <option value="poli kia">Poli KIA</option>
                                                    <option value="poli umum">Poli Umum</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <label for="dokter">Dokter </label>
                                                <select id="dokter" name="dokter" class="form-control">
                                                    @foreach ($dokter as $dokter)
                                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 d-flex align-items-end">
                                                <input type="text" class="form-control" id="id_dokter" name="id_dokter" placeholder="cooming soon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="pembayaran">Cara Bayar</label>
                                                <select id="pembayaran" name="pembayaran" class="form-control">
                                                    <option value="">--- Pilih Penjamin ---</option>
                                                    <option value="mandiri">Mandiri</option>
                                                    <option value="bpjs">BPJS</option>
                                                    <option value="asuransi">Asuransi</option>
                                                    <!-- Add options dynamically -->
                                                </select>
                                            </div>
                                            <div class="col-md-6 d-flex align-items-end">
                                                <input type="text" class="form-control" id="nomber" name="nomber" placeholder="No. Penjamin">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-5">
                                            <div class="col-md-12 text-right">
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="button" class="btn" style="background-color: #ff851b; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                            </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No. RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Poli</th>
                                            <th>Dokter</th>
                                            <th>Penjamin</th>
                                            <th>No. REG</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
