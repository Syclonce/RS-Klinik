<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Rs_app' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <!-- Select2 Bootstrap 4-->
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@6.14.1/ol.css">
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/ol@6.14.1/dist/ol.js"></script>
    <style>
        .status-select-container {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .status-select {
            display: none;
            /* Hide the original select */
        }

        .status-select-display {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: .375rem .75rem;
            color: #495057;
            font-size: 1rem;
            line-height: 1.5;
            width: 100%;
            box-sizing: border-box;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .status-badge {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        .status-late {
            background-color: #dc3545;
            color: #fff;
        }

        .status-dueSoon {
            background-color: #ffc107;
            color: #212529;
        }

        .status-longTime {
            background-color: #28a745;
            color: #fff;
        }

        .status-options {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            width: 100%;
            z-index: 1;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .status-options div {
            padding: .375rem .75rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .status-options div:hover {
            background-color: #e9ecef;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


    <style>
        .theme-switch-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: auto;
            /* Center vertically */
        }

        .theme-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .theme-switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "\f185";
            /* FontAwesome sun icon */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
            content: "\f186";
            /* FontAwesome moon icon */
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="initMap()">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-fw fa-power-off"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <button type="submit" class="dropdown-item" onclick="window.location.href='{{ route('profile.edit') }}'">
                            <i class="fas fa-user"></i> Profile
                        </button>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                            </button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-lightblue elevation-4">
            <!-- Brand Logo -->
            @php
                // Mengambil data menggunakan model Webset
                $setweb = App\Models\setweb::first(); // Anda bisa sesuaikan query ini dengan kebutuhan Anda
            @endphp
            <a href="#" class="brand-link">
                <img src="{{ asset('webset/' . $setweb->logo_app) }}" alt="Webset Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .9">
                <span class="brand-text font-weight-light">{{ $setweb->name_app }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('storage/' . Auth::user()->profile) }}" class="img-circle elevation-2"
                            alt="Profile Photo">
                    </div>
                    <div class="info">
                        @if (Auth::check())
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        @endif
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('superadmin') }}"
                                class="nav-link {{ \Route::is('superadmin') ? 'active' : '' }}">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('setweb') }}"
                                class="nav-link {{ \Route::is('setweb') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Web Seting
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')




        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?></strong>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- {{-- ChartJS --}} -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>




    <!-- Page specific script -->
    <script>


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true
        });

        // Saat halaman dimuat, cek apakah ada pesan sukses atau error dari server dan tampilkan SweetAlert sesuai.
        document.addEventListener('DOMContentLoaded', function() {
            if ("{{ session('success') }}") {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                });
            }

            if ("{{ session('error') }}") {
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            }
        });

        // Menerapkan preferensi dark mode saat halaman dimuat
        $(document).ready(function() {

            // Memeriksa apakah ada preferensi tema yang disimpan di local storage
            var darkMode = localStorage.getItem('darkMode');

            // Jika tidak ada preferensi tema yang disimpan, menggunakan tema terang sebagai default
            if (!darkMode) {
                $('body').removeClass('dark-mode');
                $('.navbar').removeClass('dark-mode'); // Menghapus tema gelap dari navbar
                $('.main-sidebar').removeClass(
                    'sidebar-dark-lightblue dark-mode'); // Menghapus tema gelap dari sidebar
            } else if (darkMode === 'enabled') {
                // Jika preferensi tema adalah mode gelap, aktifkan mode gelap
                $('body').addClass('dark-mode');
                $('.navbar').addClass('dark-mode'); // Menambahkan tema gelap ke navbar
                $('.main-sidebar').addClass(
                    'sidebar-dark-lightblue dark-mode'); // Menambahkan tema gelap ke sidebar
                $('#checkbox').prop('checked', true);
            }

            // Event listener untuk perubahan mode
            $('.theme-switch input').on('change', function() {
                // Menghapus kelas 'active' dari semua label
                $('.theme-switch input').removeClass('active');

                // Menambahkan kelas 'active' ke label yang diklik
                $(this).addClass('active');

                // Memeriksa apakah label yang diklik adalah label pertama (mode terang)
                if ($(this).is(':checked')) {
                    $('body').addClass('dark-mode');
                    $('.navbar').addClass('dark-mode'); // Menambahkan tema gelap ke navbar
                    $('.main-sidebar').addClass(
                        'sidebar-dark-lightblue dark-mode'); // Menambahkan tema gelap ke sidebar
                    localStorage.setItem('darkMode',
                        'enabled'); // Menyimpan preferensi dark mode pada local storage
                } else {
                    $('body').removeClass('dark-mode');
                    $('.navbar').removeClass('dark-mode'); // Menghapus tema gelap dari navbar
                    $('.main-sidebar').removeClass(
                        'sidebar-dark-lightblue dark-mode'); // Menghapus tema gelap dari sidebar
                    localStorage.setItem('darkMode',
                        'disabled'); // Menyimpan preferensi light mode pada local storage
                }
            });
        });
    </script>


    {{-- CURD Pemsion --}}
    <script>
       $(document).ready(function() {
            $("permissiontbl").DataTable({
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



        $('#addFormpermesion').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#addpermesionModal').modal('hide');
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                    $('#addFormpermesion')[0].reset();
                    window.location.href = '{{ route('permissions') }}';
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });


        $(document).on('click', '.edit-data-permesion', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama-permission');

        $('#permissionsid').val(id);
        $('#permissionnames').val(nama);
        });

        $('#editFormpermesion').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#editpermesionModal').modal('hide');
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                    window.location.href = '{{ route('permissions') }}';
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });

        $(document).on('click', '.delete-data-permesion', function() {
            var id = $(this).data('id');
            var name = $(this).data('nama-permission');

            $('#permissionsids').val(id);
            $('#deleteTextpermissions').html(
                "<span>Apa anda yakin ingin menghapus data Permession <b>" + name +
                "</b></span>");

        });

        $('#deleteFormpermesion').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#deletepermesionModal').modal('hide');
                    window.location.href = '{{ route('permissions') }}';
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });
    </script>

    {{-- CURD role --}}
    <script>
       $(document).ready(function() {
            $("roletbl").DataTable({
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



        $('#addFormrole').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#addroleModal').modal('hide');
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                    $('#addFormrole')[0].reset();
                    window.location.href = '{{ route('role') }}';
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });


        $(document).on('click', '.edit-data-role', function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama-role');

        $('#roleid').val(id);
        $('#rolenames').val(nama);
        });

        $('#editFormrole').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#editroleModal').modal('hide');
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                    window.location.href = '{{ route('role') }}';
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });

        $(document).on('click', '.delete-data-role', function() {
            var id = $(this).data('id');
            var name = $(this).data('nama-role');

            $('#roleids').val(id);
            $('#deleteTextrole').html(
                "<span>Apa anda yakin ingin menghapus data Permession <b>" + name +
                "</b></span>");

        });

        $('#deleteFormrole').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#deleteroleModal').modal('hide');
                    window.location.href = '{{ route('role') }}';
                    alert.fire({
                        icon: 'success',
                        title: response.message
                    });
                },
                error: function(xhr) {
                    toastr.error('Terjadi kesalahan saat menyimpan kendaraan.');
                }
            });
        });
    </script>

</body>

</html>
