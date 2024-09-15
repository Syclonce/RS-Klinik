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
                                <h3 class="mb-0 card-title">Janji - Konfirmasi Tertunda</h3>
                                <div class="text-right card-tools">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="janjitbl" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th class="text-center">Dokter</th>
                                  <th class="text-center">Hari Kerja</th>
                                  <th class="text-center">Waktu Mulai</th>
                                  <th class="text-center">Akhir Waktu</th>
                                  <th class="text-center">Durasi</th>
                                  <th class="text-center">Pilihan</th>
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

    <div class="modal fade" id="adddoctor" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambahkan Janji</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addFormpermesion" action="{{ route('schedule.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Pasien</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="pasien" name="pasien">
                                    @foreach ($data_pasien as $pasien)
                                    <option value="{{$pasien->id}}">{{$pasien->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dokter</label>
                                    <select class="form-control select2bs4" style="width: 100%;" id="dokter" name="dokter">
                                        <option value="">Pilih Dokter</option>
                                        @foreach ($data_dokter as $dokter)
                                        <option value="{{$dokter->id}}">{{$dokter->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                      <div class="input-group date" id="tgljanji" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#tgljanji" data-toggle="datetimepicker" id="tanggal" name="tanggal"/>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Available Slots</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="available_slots" name="available_slots">
                                        <option value="">Pilih Slot</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Janji Status</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="status" name="status">
                                    <option value="tunda">Konfirmasi Tertunda</option>
                                    <option value="konfirm">Dikonfirmasi</option>
                                    <option value="obati">Diobati</option>
                                    <option value="batal">Dibatalkan</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Catatan </label>
                                    <input type="text" class="form-control" id="catatan" name="catatan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Mengunjungi Deskripsi</label>
                                  <select class="form-control select2bs4" style="width: 100%;"  id="deskripsi" name="deskripsi" disabled>
                                    <option value="">Pilih Deskripsi</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Mengunjungi biaya </label>
                                    <input type="text" class="form-control" id="harga" name="harga" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>diskon</label>
                                    <input type="number" class="form-control" id="diskon" name="diskon" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>total Keseluruhan</label>
                                    <input type="text" class="form-control" id="total" name="total" disabled>
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
        $(document).ready(function(){
    $('#dokter, #tgljanji').on('change', function(){
        var dokter = $('#dokter').val();
        var tanggal = $('#tanggal').val();
        console.log('dokter:', dokter);
        console.log('tanggal:', tanggal);
        if (dokter && tanggal) {
            // Send the AJAX request using GET method
            $.ajax({
                type: 'GET',
                url: '/janji/available-slots', // Replace with your desired URL
                data: {
                    'dokter': dokter,
                    'tanggal': tanggal
                },

                success: function(data) {
                    console.log('Available slots:', data);

                    // Update the available slots select box
                    $('#available_slots').empty();
                    $.each(data, function(index, slot) {
                        $('#available_slots').append('<option value="' + slot.id + '">' + slot.awal + '-' + slot.akhir + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    // Display a user-friendly error message
                    alert('Error: ' + error);
                }
            });
        }
    });
});
    </script>
    <script>
        $(document).ready(function() {
           // Handle doctor selection change
    $('#dokter').on('change', function() {
        var dokterId = $(this).val();

        if (dokterId) {
            $('#deskripsi').prop('disabled', false);

            $.ajax({
                url: '/janji/get-visit-descriptions/' + dokterId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log("Received data:", data);

                    $('#deskripsi').empty(); // Clear previous options

                    if (data.descriptions && Array.isArray(data.descriptions)) {
                        $.each(data.descriptions, function(index, visit) {
                            $('#deskripsi').append('<option value="'+ visit.id +'" data-harga="'+ visit.harga +'">'+ visit.deskripsi +'</option>');
                        });

                        // Set the first option as selected
                        if (data.descriptions.length > 0) {
                            var firstVisit = data.descriptions[0];
                            $('#harga').val("Rp " + parseFloat(firstVisit.harga).toLocaleString());
                        } else {
                            $('#harga').val("Harga tidak tersedia");
                        }
                    } else {
                        $('#deskripsi').append('<option value="">Tidak ada deskripsi</option>');
                        $('#harga').val("Harga tidak tersedia");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error: " + status + " - " + error);
                }
            });
        } else {
            $('#deskripsi').prop('disabled', true).empty().append('<option value="">Pilih Deskripsi</option>');
            $('#harga').val(""); // Clear the input value
        }
    });
  // Function to update total price
  function updateTotal() {
        var hargaText = $('#harga').val();
        var harga = parseFloat(hargaText.replace(/Rp\s|\./g, '')) || 0; // Convert formatted price to number
        var diskonPercent = parseFloat($('#diskon').val()) || 0; // Get the discount percentage

        // Calculate the discount amount
        var discountAmount = (harga * diskonPercent) / 100;
        var total = harga - discountAmount; // Calculate the total
        $('#total').val(total > 0 ? "Rp " + total.toLocaleString() : "Rp 0");
    }

    // Handle description selection change
    $('#deskripsi').on('change', function() {
        var selectedOption = $(this).find('option:selected');
        var harga = selectedOption.data('harga'); // Get the harga from the selected option

        if (harga !== undefined && harga !== null) {
            $('#harga').val("Rp " + parseFloat(harga).toLocaleString());
            updateTotal(); // Update the total when price changes
        } else {
            $('#harga').val("Harga tidak tersedia");
            $('#total').val("Rp 0"); // Clear total if price is not available
        }
    });

    // Handle discount change
    $('#diskon').on('input', function() {
        updateTotal(); // Update the total when discount percentage changes
    });

            $("#janjitbl").DataTable({
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
