@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Stok Opname</h3>
                            </div>
                            <div class="card-body">
                                <table id="doctortblOpname" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Real</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Stok</th>
                                            <th>Kode Bangsal</th>
                                            <th>Nama Bangsal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($data as $item)
                                            <tr data-id="{{ $item->id }}">
                                                <td>{{ $item->stok }}</td>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->harga_beli }}</td>
                                                <td>{{ $item->stok }}</td>
                                                <td>{{ $item->bangsal->nama_bangsal }}</td>
                                                <td>{{ $item->bangsal->kode_bangsal }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $("#doctortblOpname").DataTable({
                "responsive": true,
                "autoWidth": false,
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
