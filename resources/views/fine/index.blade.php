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
                                <h3 class="mb-0 card-title">Pembayaran</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                        {{-- <form action="{{ route('finance.add') }}" method="POST"> --}}
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctortbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Faktur</th>
                                            <th>Pasien</th>
                                            <th>Dokter</th>
                                            <th>Tanggal</th>
                                            <th>Dari</th>
                                            <th>Sub Total</th>
                                            <th>Diskon</th>
                                            <th>Total Keseluruhan</th>
                                            <th>Dibayar Jumlah</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Catatan</th>
                                            <th>Pilihan</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->nama }}</td>
                                                <td>{{ $doctor->Alamat }}</td>
                                                <td>{{ implode(', ', json_decode($doctor->spesialis)) }}</td>
                                                <td>{{ $doctor->telepon }}</td>
                                                <td>{{ $doctor->user->email }}</td>
                                                <td><a href="{{ route('doctor.doctor', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>
                                                <td><a href="{{ route('doctor.doctor.liburan', ['id' =>  $doctor->id ]) }}" class="edit-data-permesion"><i class="fa fa-edit text-secondary"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
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



<div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambahkan Pembayaran Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('doctor.add') }}" method="POST">
                        @csrf
                        <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Pertama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Kedua</a>
                        </li>
                        </ul>
                        <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Pasien </label>
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="pasien" name="pasi">
                                            @foreach ($pasien as $pasien)
                                            <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Dokter </label>
                                        <select class="form-control select2bs4"  style="width: 100%;"  id="dokter" name="dokter">
                                            @foreach ($dokter as $docter)
                                            <option value="{{$docter->id}}">{{$docter->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih </label>
                                        <select class="select2bs4" multiple="multiple" style="width: 100%;"  id="pilih" name="pilih">
                                            @foreach ($pilih as $pilih)
                                            <option value="{{$pilih->id}}">{{$pilih->kode}} - {{$pilih->pembayaran}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <br>
                                    <table id="tabelpilih" class="table table-striped table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Task</th>
                                            <th>Progress</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>

                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Sub Total </label>
                                    <input type="text" class="form-control" id="totals" name="totals">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <input type="number" class="form-control" id="diskon" name="diskon">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>total Kotor</label>
                                    <input type="text" class="form-control" id="totalk" name="totalk">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Jumlah Deposit</label>
                                    <input type="text" class="form-control" id="deposit" name="deposit">
                                </div>
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

$(document).ready(function() {
    $('#pilih').on('change', function() {
        var pilihIds = $(this).val(); // Get selected values as an array (multi-select)
        console.log("Selected IDs:", pilihIds);

        if (pilihIds && pilihIds.length > 0) { // Check if any value is selected
            $.ajax({
                url: '/get-all-data', // Update your route to handle multiple IDs
                type: "GET",
                data: { pilihIds: pilihIds }, // Send the array of selected IDs
                dataType: "json",
                success: function(data) {
                    console.log("Received data:", data);

                    $('#tabelpilih tbody').empty(); // Clear previous table data
                    var subTotal = 0; // Initialize sub total

                    if (data && data.length > 0) {
                        $.each(data, function(index, item) {
                            var newRow = `
                                <tr>
                                    <td>${item.kode} - ${item.harga}</td>
                                    <td>1</td>
                                </tr>`;
                            $('#tabelpilih tbody').append(newRow);

                            // Add to sub total
                            subTotal += parseFloat(item.harga);
                        });

                        // Set sub total value in the input field
                        $('#totals').val(subTotal.toFixed(2));
                    } else {
                        $('#tabelpilih tbody').append('<tr><td colspan="2">No data found</td></tr>');
                    }

                    // Calculate total after discount
                    calculateTotal();
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error: " + status + " - " + error);
                }
            });
        } else {
            // Clear the table and reset totals if no selections
            $('#tabelpilih tbody').empty().append('<tr><td colspan="2">No data selected</td></tr>');
            $('#totals').val('0.00');
            $('#totalk').val('0.00');
        }
    });

    // Function to calculate total after discount
    $('#diskon').on('input', function() {
        calculateTotal();
    });

    function calculateTotal() {
        var subTotal = parseFloat($('#totals').val()) || 0;
        var discountPercent = parseFloat($('#diskon').val()) || 0;

        // Calculate the discount amount (percentage of the sub total)
        var discountAmount = (discountPercent / 100) * subTotal;

        // Calculate total after discount
        var totalAfterDiscount = subTotal - discountAmount;

        // Ensure the total doesn't go below 0
        totalAfterDiscount = totalAfterDiscount < 0 ? 0 : totalAfterDiscount;

        // Update total amount in the input field
        $('#totalk').val(totalAfterDiscount.toFixed(2));
    }
});



        $(document).ready(function() {
            $("#doctortbl").DataTable({
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
