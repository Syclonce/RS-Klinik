    @extends('template.app')

    @section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row ">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Obat & BHP</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="doctortbl" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Dasar</th>
                                                <th>Harga Beli</th>
                                                <th>Expired</th>
                                                <th>Lokasi & Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bhp as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->harga_dasar }}</td>
                                                <td>{{ $item->harga_beli }}</td>
                                                <td>{{ $item->expired }}</td>
                                                <td>
                                                    @php
                                                        // Flag to check if there's a matching record
                                                        $hasOpname = false;
                                                    @endphp

                                                    @foreach ($opname as $oph)

                                                        @if ($oph->kode == $item->kode)
                                                            <div>Stok: {{ $oph->stok }}</div>
                                                            <div>Lokasi: {{ $oph->bangsal->nama_bangsal }}</div>
                                                            @php
                                                                $hasOpname = true;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if (!$hasOpname)
                                                        <!-- Jika tidak ada data yang cocok di opname -->
                                                        <div>Stok tidak tersedia</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- Tombol Edit Stok -->
                                                    <button class="btn btn-warning btn-sm" onclick="showStokModal('{{ $item->kode }}', '{{ $item->nama }}', '{{ $item->harga_dasar }}', '{{ $item->harga_beli }}', '{{ $item->expired }}', '{{ $item->lokasi_stok }}')">Stok</button>
                                                    <!-- Tombol Hapus -->
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </td>
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

        <!-- Modal untuk Set Stok Data Barang -->
<div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('farmasi.obat.add') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3"> <!-- Add margin-bottom -->
                            <label for="kode">Kode Barang</label>
                            <input type="text" class="form-control" id="kode" name="kode" readonly>
                        </div>
                        <div class="col-md-4 mb-3"> <!-- Add margin-bottom -->
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                        </div>
                        <div class="col-md-4 mb-3"> <!-- Add margin-bottom -->
                            <label for="harga_dasar">Harga Dasar</label>
                            <input type="text" class="form-control" id="harga_dasar" name="harga_dasar" readonly>
                        </div>
                        <div class="col-md-6 mb-3"> <!-- Add margin-bottom -->
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expired">expired</label>
                            <input type="text" class="form-control" id="expired" name="expired" readonly> <!-- Menggunakan disabled -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_bangsal">Pilih Bangsal</label>
                            <select class="form-control" id="nama_bangsal" name="nama_bangsal">
                                <option value="">- Pilih Bangsal -</option>
                                @foreach ($bangsal as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_bangsal }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3"> <!-- Add margin-bottom -->
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
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
            $(document).ready(function() {
                $("#doctortbl").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                    "buttons": false,
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

    <script>
        function showStokModal(kode, nama, hargaDasar, hargaBeli, expired, lokasiStok) {
            // Set values in the modal
            $('#kode').val(kode);
            $('#nama').val(nama);
            $('#harga_dasar').val(hargaDasar);
            $('#harga_beli').val(hargaBeli);
            $('#expired').val(expired);
            $('#stokBarang').val(''); // Reset the stok field

            // Show the modal
            $('#adddoctor').modal('show');
        }
    </script>

    @endsection
