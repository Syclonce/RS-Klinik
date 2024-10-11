<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Rs_app' }}</title>


     <!-- Brand Logo -->
     @php
     // Mengambil data menggunakan model Webset
        $setweb = App\Models\setweb::first(); // Anda bisa sesuaikan query ini dengan kebutuhan Anda
    @endphp
        <!-- Favicon untuk browser standar -->
        <link rel="icon"sizes="180x180" type="image/x-icon" href="{{ asset('webset/' . $setweb->logo_app) }}">
        {{-- <!-- Favicon untuk perangkat Apple -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

        <!-- Favicon untuk Android -->
        <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">

        <!-- Favicon untuk resolusi lebih tinggi -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}"> --}}

    <!-- Jquery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- chartjs -->
    <script src="{{ asset('plugins/chart.js/Chart.js') }}"></script>
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
            background-color: #343a40;
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

    <style>
                /* Custom CSS to style thead in dark mode */
        body.dark-mode thead tr th {
            background-color: #343a40; /* Dark background for thead */
            color: #ffffff; /* White text for thead */
        }


        .profile-name {
            font-size: 1.0rem; /* Increase font size */
            color: #000; /* Default text color */
        }

        /* Dark mode style */
        body.dark-mode .profile-name {
            color: #fff; /* White color for dark mode */
        }
    </style>

    <style>
        /* CSS untuk select2 di mode dark */
        body.dark-mode .select2-container--bootstrap4 .select2-selection {
            background-color: #343a40;
            color: #fff;
            border-color: #6c757d;
        }

        body.dark-mode .select2-container--bootstrap4 .select2-selection__rendered {
            color: #fff;
        }

        body.dark-mode .select2-container--bootstrap4 .select2-selection__arrow b {
            border-color: #fff transparent transparent transparent;
        }

        /* Dropdown select2 */
        body.dark-mode .select2-container--bootstrap4 .select2-dropdown {
            background-color: #343a40;
            color: #fff;
        }

        body.dark-mode .select2-container--bootstrap4 .select2-results__option {
            color: #fff;
        }

        body.dark-mode .select2-container--bootstrap4 .select2-results__option--highlighted {
            background-color: #343a40;
            color: #fff;
        }
    </style>

    <style>

        /* Warna default untuk light mode */
        .nav-link .fa-bars {
            color: #333;  /* Warna ikon saat di light mode (gelap) */
        }

        /* Warna di dark mode */
        .dark-mode .nav-link .fa-bars {
            color: #fff;  /* Warna ikon saat di dark mode (putih) */
        }

        /* Warna default untuk light mode */
        .nav-item .fa-arrow-right-from-bracket {
            color: #333;  /* Warna ikon saat di light mode (gelap) */
        }

        /* Warna di dark mode */
        .dark-mode .nav-item .fa-arrow-right-from-bracket {
            color: #fff;  /* Warna ikon saat di dark mode (putih) */
        }

    </style>

    <style>
        .nav-link {
        display: flex;
        align-items: center;
        }

        .nav-link i {
            font-size: 1.2rem; /* Samakan ukuran ikon */
        }

        .nav-link p {
            margin-left: 10px; /* Atur jarak antara ikon dan teks */
            display: flex;
            align-items: center; /* Sejajarkan teks secara vertikal dengan ikon */
        }
    </style>

</head>

<body class="layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="ml-auto navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset('user/' . Auth::user()->profile) }}" alt="User Profile" class="img-circle" style="width:30px;">
                        @if (Auth::check())
                        <span class="ml-2 profile-name">{{ Auth::user()->name }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <div class="media">
                            <form action="{{ route('profile.edit') }}" method="get" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fa-regular fa-user"></i> Profile</button>
                            </form>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                        <div class="media">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                            </form>
                        </div>
                      </a>
                    </div>
                  </li>
                <!-- Sidebar user panel (optional) -->
                <li class="nav-item">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-no-expand sidebar-light-info">

            <a href="#" class="brand-link">
                <img src="{{ asset('webset/' . $setweb->logo_app) }}" alt="Webset Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .9">
                <span class="brand-text font-weight-light"><b>{{ $setweb->name_app }}</b></span>
            </a>

            @include('template.sidebar')
        </aside>


        @yield('content')




        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?></strong>

        </footer>
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

    <!-- qr -->
    <script src="{{ asset('plugins/js/qrcode.js') }}"></script>
    <script src="{{ asset('plugins/js/main.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
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
        $(document).ready(function() {
            // Apply Inputmask
            $('#harga').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true
            });

            // $('#potongan').inputmask({
            //     alias: 'numeric',
            //     groupSeparator: '.',
            //     autoGroup: true,
            //     digits: 0,
            //     digitsOptional: false,
            //     prefix: 'Rp ',
            //     rightAlign: false,
            //     removeMaskOnSubmit: true
            // });

            // $('#jumlah_bayar').inputmask({
            //     alias: 'numeric',
            //     groupSeparator: '.',
            //     autoGroup: true,
            //     digits: 0,
            //     digitsOptional: false,
            //     prefix: 'Rp ',
            //     rightAlign: false,
            //     removeMaskOnSubmit: true
            // });

            $('#pembelian').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true
            });

            $('#penjualan').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true
            });

            $('#biaya').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true
            });

            $('#deposit').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: false,
                prefix: 'Rp ',
                rightAlign: false,
                removeMaskOnSubmit: true
            });
            // Apply Inputmask for phone number
            $('#telepon').inputmask({
                mask: '(99) 999-999-999',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false
            });

            $('#telp_cp').inputmask({
                mask: '(99) 999-999-999',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false
            });

            $('#hp_cp').inputmask({
                mask: '(99) 999-999-9999',
                placeholder: ' ',
                showMaskOnHover: false,
                showMaskOnFocus: false
            });
        });

        $(document).ready(function() {
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $('[data-mask]').inputmask()

            $('#awalacara').datetimepicker({
                format: 'LT'
            })
            $('#akhiracara').datetimepicker({
                format: 'LT'
            })
            $('#tglliburan').datetimepicker({
                format: 'L'
            });
            $('#penjamin_awal').datetimepicker({
                format: 'L'
            });
            $('#penjamin_akhir').datetimepicker({
                format: 'L'
            });
            $('#tgljanji').datetimepicker({
                format: 'L'
            })
            $('#tglawal').datetimepicker({
                format: 'L'
            })
            $('#tgllahir').datetimepicker({
                format: 'L'
            })
            $('#expired').datetimepicker({
                format: 'L'
            })
            $("#timepicker").datetimepicker({
                format: "LT",
            });
            $('#tanggal_rawat').datetimepicker({
                icons: { time: 'far fa-clock' }
            });
        });
    </script>

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
            if ("{{ session('Success') }}") {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('Success') }}"
                });
            }

            if ("{{ session('error') }}") {
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                });
            }
            if ("{{ session('status') === 'profile-updated' }}") {
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('Success') }}"
                });
            }
        });

        $(function() {
            $('#tahunBuat, #tanggalPajak, #tanggalStnk').datetimepicker({
                format: 'L'
            });
        });

        // Menerapkan preferensi dark mode saat halaman dimuat
        $(document).ready(function() {

            // Memeriksa apakah ada preferensi tema yang disimpan di local storage
            var darkMode = localStorage.getItem('darkMode');

            // Jika tidak ada preferensi tema yang disimpan, menggunakan tema terang sebagai default
            if (!darkMode) {
                $('body').removeClass('dark-mode');
                $('.navbar').removeClass('bg-gray-dark'); // Menghapus tema gelap dari navbar
                $('.main-sidebar').removeClass(
                    'sidebar-dark-info'); // Menghapus tema gelap dari sidebar
                $('.main-sidebar').addClass(
                    'sidebar-light-info'); // Menambahkan tema gelap ke sidebar
            } else if (darkMode === 'enabled') {
                // Jika preferensi tema adalah mode gelap, aktifkan mode gelap
                $('body').addClass('dark-mode');
                $('.navbar').addClass('bg-gray-dark'); // Menambahkan tema gelap ke navbar
                $('.main-sidebar').addClass(
                    'sidebar-dark-info'); // Menambahkan tema gelap ke sidebar
                $('.main-sidebar').removeClass(
                    'sidebar-light-info');
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
                    $('.navbar').addClass('bg-gray-dark'); // Menambahkan tema gelap ke navbar
                    $('.main-sidebar').addClass(
                        'sidebar-dark-info'); // Menambahkan tema gelap ke sidebar
                    $('.main-sidebar').removeClass(
                        'sidebar-light-info');
                    localStorage.setItem('darkMode',
                        'enabled'); // Menyimpan preferensi dark mode pada local storage
                } else {
                    $('body').removeClass('dark-mode');
                    $('.navbar').removeClass('bg-gray-dark'); // Menghapus tema gelap dari navbar
                    $('.main-sidebar').removeClass(
                        'sidebar-dark-info'); // Menghapus tema gelap dari sidebar
                    $('.main-sidebar').addClass(
                        'sidebar-light-info');
                    localStorage.setItem('darkMode',
                        'disabled'); // Menyimpan preferensi light mode pada local storage
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
