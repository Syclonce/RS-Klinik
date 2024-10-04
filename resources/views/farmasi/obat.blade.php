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
                                            <th>Aksi</th> <!-- Pastikan kolom aksi ada di sini -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bhp as $bhp) <!-- Ganti $bhp menjadi $item untuk menghindari konflik -->
                                            <tr>
                                                <td>{{ $bhp->kode }}</td>
                                                <td>{{ $bhp->nama }}</td>
                                                <td>{{ $bhp->harga_dasar }}</td>
                                                <td>{{ $bhp->harga_beli }}</td>
                                                <td>{{ $bhp->expired }}</td>
                                                <td>{{ $bhp->lokasi_stok }}</td> <!-- Kolom untuk lokasi dan stok -->
                                                <td>
                                                    <!-- Tombol Edit -->
                                                    <button class="btn btn-warning btn-sm" onclick="editBhp({{ $bhp->id }})">Stok</button>
                                                    <!-- Tombol Hapus -->
                                                    <button class="btn btn-danger btn-sm" onclick="deleteBhp({{ $bhp->id }})">Delete</button>
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

    <script>
        // Fungsi untuk menangani edit BHP
        function editBhp(id) {
            // Logika untuk mengedit data berdasarkan ID
            console.log("Edit BHP dengan ID:", id);
            // Mungkin buka modal pengeditan atau navigasi ke halaman edit
        }

        // Fungsi untuk menangani hapus BHP
        function deleteBhp(id) {
            if (confirm("Apakah Anda yakin ingin menghapus BHP ini?")) {
                // Logika untuk menghapus data berdasarkan ID
                console.log("Hapus BHP dengan ID:", id);
                // Lakukan penghapusan melalui AJAX atau navigasi ke rute penghapusan
            }
        }

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
@endsection
