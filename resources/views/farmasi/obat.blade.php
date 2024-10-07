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
                                            <td class="lokasi-stok">{{ $item->lokasi_stok }}</td>
                                            <td>
                                                <!-- Tombol Edit Stok -->
                                                <button class="btn btn-warning btn-sm" onclick="showModalStok({{ $item->id }}, '{{ $item->nama }}')">Stok</button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm" onclick="deleteBhp({{ $item->id }})">Delete</button>
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
    <div class="modal fade" id="modalStok" tabindex="-1" aria-labelledby="modalStokLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalStokLabel">Set Stok Data Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="stokForm">
              <div class="mb-3">
                <label for="pilihBangsal" class="form-label">Pilih Bangsal</label>
                <select class="form-select" id="pilihBangsal" required>
                  <option value="">- Pilih Bangsal -</option>
                  <option value="Anggrek">Anggrek</option>
                  <option value="Apotek">Apotek</option>
                  <option value="Gudang Farmasi">Gudang Farmasi</option>
                  <option value="Melati">Melati</option>
                  <!-- Tambahkan opsi bangsal sesuai kebutuhan -->
                </select>
              </div>
              <div class="mb-3">
                <label for="stokBarang" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stokBarang" required>
              </div>
              <input type="hidden" id="barangId"> <!-- Untuk menyimpan ID barang -->
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" onclick="submitStok()">Simpan</button>
          </div>
        </div>
      </div>
    </div>

    <script>
        // Mengatur CSRF token untuk AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Fungsi untuk menyimpan data stok di Local Storage
        function saveStokData() {
            var bhpData = [];

            // Ambil semua baris di tabel dan simpan dalam array
            $('#doctortbl tbody tr').each(function() {
                var id = $(this).data('id');
                var lokasiStok = $(this).find('.lokasi-stok').html() || '';
                bhpData.push({ id: id, lokasi_stok: lokasiStok });
            });

            // Simpan ke Local Storage
            localStorage.setItem('bhpData', JSON.stringify(bhpData));
        }

        // Fungsi untuk menampilkan data dari Local Storage ke tabel
        function loadStokData() {
            var bhpData = JSON.parse(localStorage.getItem('bhpData')) || [];

            // Loop melalui data dan masukkan kembali ke tabel
            bhpData.forEach(function(item) {
                var row = $('tr[data-id="' + item.id + '"]');
                row.find('.lokasi-stok').html(item.lokasi_stok);
            });
        }

        function submitStok() {
            var idBarang = $('#barangId').val();  // Ambil ID barang dari input hidden
            var bangsal = $('#pilihBangsal').val();  // Ambil data bangsal
            var stok = $('#stokBarang').val();  // Ambil stok

            // Validasi input
            if (!bangsal || !stok) {
                alert('Pastikan semua kolom diisi!');
                return;
            }

            // Simpan ke Local Storage
            localStorage.setItem('stokData_' + idBarang, JSON.stringify({ bangsal: bangsal, stok: stok }));

            // Cari baris yang sesuai berdasarkan data-id
            var row = $('tr[data-id="' + idBarang + '"]');

            // Dapatkan elemen kolom "Lokasi & Stok"
            var lokasiStokCell = row.find(".lokasi-stok");

            // Cek apakah sudah ada stok di lokasi tersebut
            var existingStok = lokasiStokCell.html();

            if (existingStok) {
                // Jika ada stok yang sudah ada, tambahkan stok baru
                lokasiStokCell.html(existingStok + "<br>" + bangsal + ": " + stok + " unit");
            } else {
                // Jika belum ada stok, set lokasi dan stok baru
                lokasiStokCell.html(bangsal + ": " + stok + " unit");
            }

            // Reset data di Local Storage setelah berhasil disimpan
            localStorage.removeItem('stokData_' + idBarang);

            // Simpan data stok yang telah diperbarui ke Local Storage
            saveStokData();

            // Tutup modal setelah data berhasil disimpan
            $('#modalStok').modal('hide');
        }

        // Fungsi untuk menampilkan modal dan memasukkan data barang
        function showModalStok(id, namaBarang) {
            $('#barangId').val(id);  // Set ID barang ke dalam form
            $('#stokForm')[0].reset();  // Reset form
            $('#modalStokLabel').text('Set Stok untuk ' + namaBarang);  // Set judul modal

            // Ambil data dari Local Storage jika ada
            var stokData = localStorage.getItem('stokData_' + id);
            if (stokData) {
                var data = JSON.parse(stokData);
                $('#pilihBangsal').val(data.bangsal);
                $('#stokBarang').val(data.stok);
            }

            $('#modalStok').modal('show');  // Tampilkan modal
        }

        // Fungsi untuk menangani hapus BHP
        function deleteBhp(id) {
            // Tanyakan konfirmasi sebelum menghapus
            if (confirm("Apakah Anda yakin ingin menghapus BHP ini?")) {
                // Hapus data dari Local Storage
                localStorage.removeItem('stokData_' + id);

                // Hapus baris dari tabel
                $('tr[data-id="' + id + '"]').remove();
                saveStokData(); // Simpan data setelah penghapusan
                alert('BHP berhasil dihapus.');
            }
        }

        $(document).ready(function() {
            // Panggil fungsi untuk memuat data dari Local Storage saat halaman dimuat
            loadStokData();

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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
@endsection
