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
                                <h3 class="card-title mb-0">Farmasi Semua Penjualan</h3>
                                <div class="card-tools text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#adddoctor">
                                        <i class="fas fa-plus"></i> Tambah Baru
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="doctortbl" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Faktur</th>
                                            <th>Tanggal</th>
                                            <th>Sub Total</th>
                                            <th>Diskon</th>
                                            <th>Total Keseluruhan</th>
                                            <th>Harga Penjualan</th>
                                            <th width="20%">Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <!-- @foreach ($data as $data)
                                            <tr>
                                                <td>{{ $data->id}}</td>
                                                <td>{{ $data->nama}}</td>
                                                <td>{{ $data->obatk->nama}}</td>
                                                <td>{{ $data->kota}}</td>
                                                <td>{{ $data->pembelian}}</td>
                                                <td>{{ $data->penjualan}}</td>
                                                <td>{{ $data->kuantitas}}</td>
                                                <td>{{ $data->generik}}</td>
                                                <td>{{ $data->perusahaan}}</td>
                                                <td>{{ $data->efek}}</td>
                                                <td>{{ $data->tanggal}}</td>
                                                </td>
                                            </tr>
                                        @endforeach --> --}}
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
                    <h5 class="modal-title" id="addModalLabel">Farmasi Titik penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farmasi.kategori.add') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Pilih Item</label>
                                    <select class="select2bs4" multiple="multiple"  style="width: 100%;"  id="pilih_item" name="pilih_item">
                                         @foreach ($obat as $obat)
                                        <option value="{{$obat->id}}">{{$obat->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="card card-row card-secondary">
                                    <div class="card-body" id="datafarmas">
                                        <!-- The dynamically inserted data will appear here -->
                                        <div id="kuantitas">
                                            <!-- This is where the dynamic content from AJAX will be appended -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                        <label>Sub Total </label>
                                        <input type="text" class="form-control" id="sub_total" name="sub_total">
                                    </div>
                                <div class="form-group">
                                        <label>Diskon </label>
                                        <input type="text" class="form-control" id="diskon" name="diskon">
                                    </div>
                                <div class="form-group">
                                        <label>Total Kotor </label>
                                        <input type="text" class="form-control" id="total_kotor" name="total_kotor">
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

            let selectedItems = {}; // Store selected item IDs and their quantities

$('#pilih_item').on('change', function() {
    var pilihIds = $(this).val(); // Get selected values as an array (multi-select)
    console.log("Selected IDs:", pilihIds);

    if (pilihIds && pilihIds.length > 0) {
        $.ajax({
            url: '/farmasi/get-all-data',
            type: "GET",
            data: { pilihIds: pilihIds }, // Send the array of selected IDs
            dataType: "json",
            success: function(data) {
                console.log("Received data:", data);

                // Loop through each selected item
                $.each(data, function(index, item) {
                    if (!selectedItems[item.id]) {
                        // Add item to selectedItems if not already added
                        selectedItems[item.id] = {
                            nama: item.nama,
                            perusahaan: item.perusahaan,
                            harga: item.penjualan,
                            kuantitas: item.kuantitas,
                            selectedQuantity: 0
                        };
                    }

                    var currentSelectedQuantity = selectedItems[item.id].selectedQuantity;

                    var newRow = `
                    <div class="card card-light card-outline" id="item_card_${item.id}">
                        <div class="card-body">
                            <p> Nama : ${item.nama} <br>
                                Company : ${item.perusahaan} <br>
                                Harga : ${item.penjualan} <br>
                                Current Stock : ${item.kuantitas}</p>
                            <label for="quantity_${item.id}">Enter Quantity:</label>
                            <input type="number" id="quantity_${item.id}" class="form-control quantity-input" min="1" max="${item.kuantitas}" data-max="${item.kuantitas}" data-id="${item.id}" data-price="${item.penjualan}" placeholder="Max: ${item.kuantitas}" value="${currentSelectedQuantity}" />
                            <span id="error_${item.id}" class="text-danger" style="display:none;">Quantity exceeds current stock</span>
                        </div>
                    </div>
                    `;

                    // Only append the new row if it doesn't already exist
                    if (!$(`#item_card_${item.id}`).length) {
                        $('#kuantitas').append(newRow);
                    }

                    // Handle quantity input and validation
                    $(`#quantity_${item.id}`).on('input', function() {
                        var inputVal = parseInt($(this).val()); // Get the input value
                        var maxStock = parseInt($(this).data('max')); // Get the max stock from data attribute
                        var itemId = $(this).data('id');

                        if (inputVal > maxStock) {
                            $(`#error_${itemId}`).show(); // Show error message
                        } else {
                            $(`#error_${itemId}`).hide(); // Hide error message
                            selectedItems[itemId].selectedQuantity = inputVal; // Update the selected quantity in the object
                            updateSubtotal(); // Automatically recalculate totals
                        }
                    });
                });

                // Automatically update totals when discount field changes
                $('#diskon').on('input', function() {
                    updateSubtotal(); // Automatically recalculate totals when discount changes
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: " + status + " - " + error);
                $('#kuantitas').empty(); // Clear content on error
                $('#kuantitas').append('<div class="card card-light card-outline"><div class="card-body"><p>Error retrieving data</p></div></div>');
            }
        });
    } else {
        // Clear the table if no selections are made
        $('#kuantitas').empty(); // Clear previous table data
        selectedItems = {}; // Reset the selected items
        $('#kuantitas').append('<div class="card card-light card-outline"><div class="card-body"><p>No data found</p></div></div>');
    }
});

// Function to update the subtotal and total automatically
function updateSubtotal() {
    let subtotal = 0;

    // Calculate subtotal from the selectedItems object
    $.each(selectedItems, function(id, item) {
        subtotal += item.selectedQuantity * item.harga;
    });

    // Update the Sub Total field without decimals
    $('#sub_total').val(Math.round(subtotal));

    // Get the discount percentage (ensure it's a valid number)
    var discountPercent = parseFloat($('#diskon').val()) || 0;

    // Ensure discount percentage is within a valid range (0-100)
    if (discountPercent < 0) discountPercent = 0;
    if (discountPercent > 100) discountPercent = 100;

    // Calculate discount amount (percentage of subtotal)
    var discountAmount = (discountPercent / 100) * subtotal;

    // Calculate the total after discount (Total Kotor)
    var totalKotor = subtotal - discountAmount;

    // Update the Total Kotor field without decimals
    $('#total_kotor').val(Math.round(totalKotor));
}



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
