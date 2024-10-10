@extends('template.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="col-6 mt-3">
                    <div class="row d-flex">
                        {{-- <form action="{{ route('penjualan.order.add') }}" method="POST" class="row w-100"> --}}
                            <form id="orderForm"  class="row w-100">
                            @csrf
                            <!-- Kelola Data Pasien -->
                            <div class="col-md-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5>Informasi Penjualan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="tgl">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="timepicker">Jam</label>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" class="form-control timepicker-input" data-target="#timepicker" id="time" name="time">
                                                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="nama">Nama Pembeli</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pembeli">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="Alamat">Alamat Pembeli</label>
                                                <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Pembeli">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="telepon">No. Telepon</label>
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="No. Telepon Pembeli">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="ket">Keterangan</label>
                                                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-9">
                                                <label for="nama_brg">Nama Barang</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="nama_brg" name="nama_brg">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($datapjl as $data)
                                                        <option value="{{ $data->id }}" data-harga="{{ $data->harga }}">{{ $data->nama_barang }} - stok: {{ $data->stok }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="jml" class="d-none d-md-block">&nbsp;</label> <!-- Placeholder to align -->
                                                <input type="number" class="form-control" id="jml" name="jml" placeholder="Jumlah">
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <!-- Buttons centered -->
                                        <div class="d-flex justify-content-end mt-4"> <!-- Add margin-top for spacing -->
                                            <button type="button" class="btn btn-light mr-2" id="btnRincian" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Masukkan Rincian
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="row d-flex">
                            <!-- Kelola Data Pasien -->
                            <div class="col-md-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-header bg-light">
                                        <h5> Rincian Penjualan</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tabel untuk menampilkan rincian barang -->
                                        <table id="tabel-data" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No. </th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th width="10%">Pilihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Baris rincian barang akan ditambahkan di sini oleh jQuery -->
                                            </tbody>
                                        </table>
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-3">
                                                <label for="jml_tagihan">Jumlah Tagihan</label>
                                                <input type="text" class="form-control" id="jml_tagihan" name="jml_tagihan" placeholder="Masukkan jumlah tagihan">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <p id="terbilang" class="form-text text-muted" style="font-size: 1em; font-weight: 400;"></p> <!-- Tempat untuk nominal dalam huruf -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="potongan">Potongan</label>
                                                <input type="text" class="form-control" id="potongan" name="potongan" placeholder="Masukkan potongan (jika ada)">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="total_bayar">Jumlah Harus Bayar</label>
                                                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <p id="total" class="form-text text-muted" style="font-size: 1em; font-weight: 400;"></p> <!-- Tempat untuk nominal dalam huruf -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                                <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Masukkan jumlah bayar">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label for="kembalian">Kembalian</label>
                                                <input type="text" class="form-control" id="kembalian" name="kembalian" placeholder="Kembalian akan muncul di sini" readonly>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <p id="kembali" class="form-text text-muted" style="font-size: 1em; font-weight: 400;"></p> <!-- Tempat untuk nominal dalam huruf -->
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="cara_bayar">Cara Bayar</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="cara_bayar" name="cara_bayar">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <option value="Tunai">Tunai</option>
                                                    <option value="Kurang Bayar">Kurang Bayar</option>
                                                    <option value="Belum Bayar">Belum Bayar</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Buttons centered -->
                                        <div class="d-flex justify-content-end mt-4"> <!-- Add margin-top for spacing -->
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Cancel
                                            </button>
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Nota
                                            </button>
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Invoice
                                            </button>
                                            <button type="submit" class="btn mr-2" style="background-color: #ff851b; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

    <script>
        $(document).ready(function() {
            var counter = 1;
            var totalTagihan = 0;

            // Fungsi untuk mengupdate tampilan potongan dan jumlah yang harus dibayar
            function updateTotalBayar() {
                const potongan = parseInt($('#potongan').val().replace(/\./g, '') || 0);
                const totalBayar = totalTagihan - potongan;

                // Pastikan total bayar tidak kurang dari 0
                $('#total_bayar').val(totalBayar >= 0 ? totalBayar.toLocaleString('id-ID') : 0);

                // Update total dalam huruf
                const totalDalamHurufBayar = numberToWords(totalBayar);
                $('#total').text(totalDalamHurufBayar + ' rupiah');
            }

            // Fungsi untuk menghitung kembalian
            function calculateKembalian() {
                const jumlahBayar = parseInt($('#jumlah_bayar').val().replace(/\./g, '') || 0);
                const totalBayar = parseInt($('#total_bayar').val().replace(/\./g, '') || 0);
                const kembalian = jumlahBayar - totalBayar;

                $('#kembalian').val(kembalian >= 0 ? kembalian.toLocaleString('id-ID') : 0);
                const kembalianDalamHuruf = numberToWords(kembalian >= 0 ? kembalian : 0);
                $('#kembali').text(kembalianDalamHuruf + ' rupiah');
            }

            function updateJumlahTagihanDalamHuruf() {
                const jmlTagihan = parseInt($('#jml_tagihan').val().replace(/\./g, '') || 0);
                const totalDalamHurufTagihan = numberToWords(jmlTagihan);
                $('#terbilang').text(totalDalamHurufTagihan + ' rupiah'); // Update paragraf terbilang
            }

            // Fungsi untuk menambah data ke tabel
            $('.btn-light').on('click', function(e) {
                e.preventDefault();

                var namaBarang = $('#nama_brg').val();
                var namaBarangs = $('#nama_brg option:selected').text();
                var jumlah = $('#jml').val();
                var harga = $('#nama_brg option:selected').data('harga');

                if (namaBarang === '-- Pilih --' || jumlah === '') {
                    alert('Pilih nama barang dan masukkan jumlah terlebih dahulu!');
                    return;
                }

                var totalHargaItem = jumlah * harga;

                $('#tabel-data tbody').append(
                    '<tr>' +
                    '<td>' + counter + '</td>' +
                    '<td data-nama-barang="' + namaBarang + '">' + namaBarangs + '</td>' +
                    '<td>' + jumlah + '</td>' +
                    '<td>' + harga.toLocaleString('id-ID') + '</td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove">Hapus</button></td>' +
                    '</tr>'
                );

                totalTagihan += totalHargaItem;
                $('#jml_tagihan').val(totalTagihan.toLocaleString('id-ID'));
                updateTotalBayar(); // Update total bayar
                updateJumlahTagihanDalamHuruf(); // Update terbilang

                counter++;
                // $('#jml').val('');
                // $('#nama_brg').val('').trigger('change');
                // Reset input jumlah ke kosong
                $('#jml').val('');
                // Reset dropdown ke opsi pertama (default) dan trigger change untuk memperbarui tampilan
                $('#nama_brg').val('-- Pilih --').trigger('change');
            });

            // Fungsi untuk menghapus baris data dari tabel
            $('#tabel-data').on('click', '.remove', function(e) {
                e.preventDefault();

                // Ambil harga dan jumlah dari baris yang dihapus
                var harga = $(this).closest('tr').find('td:eq(3)').text().replace(/\./g, '');
                var jumlah = $(this).closest('tr').find('td:eq(2)').text();
                var totalHargaItem = parseInt(harga) * parseInt(jumlah);

                // Kurangi total tagihan
                totalTagihan -= totalHargaItem;
                $('#jml_tagihan').val(totalTagihan.toLocaleString('id-ID'));

                // Hapus baris dari tabel
                $(this).closest('tr').remove();

                updateTotalBayar(); // Update total bayar setelah penghapusan
                updateJumlahTagihanDalamHuruf(); // Update terbilang setelah penghapusan
            });

            // Event listener untuk mengupdate total bayar ketika potongan berubah
            $('#potongan').on('input', function() {
                updateTotalBayar();
            });

            // Event listener untuk menghitung kembalian ketika jumlah bayar diinput
            $('#jumlah_bayar').on('input', function() {
                calculateKembalian();
            });

            // Event listener untuk mengirim data ke controller saat form disubmit
            $('#orderForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman form standar

                // Kumpulkan semua data form
                var formData = $(this).serializeArray();
                var items = [];

                // Ambil data dari tabel
                $('#tabel-data tbody tr').each(function() {
                    var row = $(this);
                    var item = {
                        nama:  row.find('td:eq(1)').data('nama-barang'),
                        jumlah: row.find('td:eq(2)').text(),
                        harga: row.find('td:eq(3)').text().replace(/\./g, '')
                    };
                    items.push(item);
                });

                // Tambahkan items ke formData
                formData.push({ name: 'items', value: JSON.stringify(items) });

                // Hapus field 'jml' dari formData jika ada
                formData = formData.filter(field => field.name !== 'jml');

                // Tampilkan data yang akan dikirim ke konsol untuk debugging
                console.log("Data yang akan dikirim:", formData);

                $.ajax({
                    url: '/penjualan/order/add', // Ganti dengan URL yang sesuai
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log("Response dari server:", response); // Menampilkan respon server
                        window.location.href = '{{route ('penjualan.order')}}'; // Ganti dengan route penjualan order yang sesua
                        // Menggunakan session yang dikirim dari controller sebagai response success
                        if (response.Success) {
                            Toast.fire({
                                icon: 'success',
                                title: response.Success // Menampilkan pesan sukses dari server
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log("Kesalahan dari server:", xhr); // Menampilkan kesalahan dari server

                        // Tampilkan pesan error dari response server
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.error // Menampilkan pesan error dari server
                            });
                        } else {
                            // Jika pesan error tidak tersedia di responseJSON, tampilkan pesan default
                            Toast.fire({
                                icon: 'error',
                                title: 'Terjadi kesalahan saat menambahkan order.'
                            });
                        }
                    }
                });
            });

            // Fungsi untuk mengonversi angka menjadi kata
            function numberToWords(num) {
                const units = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
                const teens = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
                const tens = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];
                const thousands = ["", "ribu", "juta", "miliar", "triliun"];

                if (num === 0) return "nol";

                let words = '';
                let thousandIndex = 0;

                while (num > 0) {
                    let currentPart = num % 1000;
                    if (currentPart !== 0) {
                        words = convertHundreds(currentPart, units, teens, tens) + (thousands[thousandIndex] ? ' ' + thousands[thousandIndex] : '') + ' ' + words;
                    }
                    num = Math.floor(num / 1000);
                    thousandIndex++;
                }

                return words.trim();
            }

            function convertHundreds(num, units, teens, tens) {
                let words = '';

                if (num > 99) {
                    words += units[Math.floor(num / 100)] + ' ratus ';
                    num %= 100;
                }

                if (num > 19) {
                    words += tens[Math.floor(num / 10)] + ' ';
                    num %= 10;
                }

                if (num > 9 && num < 20) {
                    words += teens[num - 10] + ' ';
                } else if (num > 0) {
                    words += units[num] + ' ';
                }

                return words.trim();
            }
        });
        </script>







@endsection
