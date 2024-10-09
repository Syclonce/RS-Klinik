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
                                                <input type="date" class="form-control" id="tgl" name="ket">
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
                                        <div class="form-group row align-items-center">
                                            <div class="col-md-9">
                                                <label for="nama_brg">Nama Barang</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="nama_brg" name="nama_brg">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    @foreach ($datapjl as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama_barang }} - stok: {{ $data->stok }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="jml" class="d-none d-md-block">&nbsp;</label> <!-- Placeholder to align -->
                                                <input type="number" class="form-control" id="jml" name="jml" placeholder="Jumlah">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="ket">Keterangan</label>
                                                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan">
                                            </div>
                                        </div>

                                        <!-- Buttons centered -->
                                        <div class="d-flex justify-content-end mt-4"> <!-- Add margin-top for spacing -->
                                            <button type="button" class="btn btn-light mr-2" style="background-color: #17a2b8; color: white;">
                                                <i class="fa fa-trash-can" style="color: white;"></i> Masukkan Rincian
                                            </button>
                                            <button type="submit" class="btn mr-2" style="background-color: #ff851b; color: white;">
                                                <i class="fa fa-floppy-disk" style="color: white;"></i> Order Baru
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tbody>
                                        </table>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="jmlh_tagihan">Jumlah Tagihan</label>
                                                <input type="text" class="form-control" id="jmlh_tagihan" name="jmlh_tagihan">
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end mt-2">
                                                <p id="terbilang" class="form-text text-muted" style="font-size: 1em; font-weight;"></p> <!-- Tempat untuk nominal dalam huruf -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="potongan">Potongan</label>
                                                <input type="text" class="form-control" id="potongan" name="potongan">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="total_bayar">Jumlah Harus Bayar</label>
                                                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-end mt-2">
                                                <p id="total" class="form-text text-muted" style="font-size: 1em; font-weight;"></p> <!-- Tempat untuk nominal dalam huruf -->
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                                <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="kembalian">Kembalian</label>
                                                <input type="text" class="form-control" id="kembalian" name="kembalian" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label for="jumlah_bayar">Jumlah Bayar</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="dokter" name="dokter">
                                                    <option value="" disabled selected>-- Pilih --</option>
                                                    <option value="Tunai" >Tunai</option>
                                                    <option value="Kurang Bayar" >Kurang Bayar</option>
                                                    <option value="Belum Bayar" >Belum Bayar</option>
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

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    // Fungsi untuk mengonversi angka ke dalam bentuk teks (terbilang)
    function toWords(num) {
        const units = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
        const teens = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
        const tens = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];
        const thousands = ["", "ribu", "juta", "miliar", "triliun"];

        if (num === 0) return "nol";

        let word = '';
        let place = 0;

        while (num > 0) {
            let n = num % 1000;
            if (n !== 0) {
                let str = '';
                if (n % 100 < 20 && n % 100 > 9) {
                    str = teens[n % 10] + " ";
                } else {
                    str = units[Math.floor(n / 100)] + " ratus " + tens[Math.floor((n % 100) / 10)] + " " + units[n % 10];
                }
                word = str + thousands[place] + " " + word;
            }
            num = Math.floor(num / 1000);
            place++;
        }

        return word.trim();
    }

    // Fungsi untuk menampilkan nilai dalam bentuk huruf
    function updateTerbilang() {
        const tagihanInput = document.getElementById('jmlh_tagihan');
        const terbilangOutput = document.getElementById('terbilang');
        const amount = parseInt(tagihanInput.value.replace(/\D/g, ''), 10) || 0;

        terbilangOutput.innerHTML = "Terbilang: " + toWords(amount) + " rupiah";
    }

    // Panggil fungsi updateTerbilang setiap kali input diubah
    document.getElementById('jmlh_tagihan').addEventListener('input', updateTerbilang);
</script>


@endsection
