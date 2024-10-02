<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $setweb = App\Models\setweb::first();
    @endphp
    <title>{{ $setweb->name_app }}</title>

    <link rel="icon" sizes="180x180" type="image/x-icon" href="{{ asset('webset/' . $setweb->logo_app) }}">
    <!-- Include styles and scripts as needed -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <style>
        .queue-main {
            background-color: #28a745;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            font-size: 5rem;
            text-align: center;
            margin-bottom: 20px;
        }
        .queue-sub {
            background-color: #ffc107;
            color: #fff;
            font-size: 2rem;
            padding: 10px;
            margin-top: -20px;
            text-align: center;
        }
        .small-queue {
            background-color: #0062cc;
            color: white;
            padding: 15px;
            text-align: center;
            margin: 10px;
            border-radius: 10px;
            font-size: 2rem;
        }
        .small-queue h1 {
            font-size: 3rem;
            color: #ffc107;
        }
        .small-queue span {
            font-size: 1.2rem;
        }
        .video-container {
            position: relative;
            padding-top: 56.25%;
            height: 0;
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .time-container {
            background-color: #0056b3;
            color: white;
            text-align: left;
            padding: 10px;
            font-size: 1.5rem;
            border-radius: 10px;
            margin-top: 20px; /* Added margin to separate from above elements */
        }
        .time-container span {
            display: block;
            margin-top: 5px;
            color: #ffc107;
        }
        .header-title {
            background-color: #0056b3; /* Set background to black */
            color: white; /* Text color to white */
            padding: 15px;
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Header section -->
                    <div class="row">
                        <div class="container d-flex justify-content-center align-items-center" style="height: 100px;">
                            <a href="#" class="navbar-brand d-flex align-items-center">
                                <img src="{{ asset('webset/' . $setweb->logo_app) }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 50px; height: 50px; margin-right: 10px;">
                                <span class="brand-text font-weight-light">{{ $setweb->name_app }} Dolphi</span>
                            </a>
                        </div>
                    </div>

                    <!-- Title Section -->
                    <div class="header-title">
                        Sistem Antrian Loket
                    </div>

                    <div class="mt-3 col-12">
                        <!-- Main Queue Display -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="queue-main">
                                    C1
                                </div>
                                <div class="queue-sub">
                                    POLI 2
                                </div>
                            </div>
                            <!-- Video Display -->
                            <div class="col-md-4">
                                <div class="video-container">
                                    <iframe src="https://www.youtube.com/embed/9FynEUYtJlE?si=aLJJC_KMLGRgZbXb" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>

                        <!-- Small Queue Sections -->
                        <div class="row">
                            <div class="col-md-2">
                                <button class="btn btn-primary small-queue" style="width: 100%; height: 100%;" onclick="window.location='{{ route('loket1') }}'">
                                    <h1>A1</h1>
                                    <span>LOKET 1</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary small-queue" style="width: 100%; height: 100%;" onclick="window.location='{{ route('loket1') }}'">
                                    <h1>D1</h1>
                                    <span>KIA/KB</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary small-queue" style="width: 100%; height: 100%;" onclick="window.location='{{ route('loket1') }}'">
                                    <h1>E1</h1>
                                    <span>POLI GIGI</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary small-queue" style="width: 100%; height: 100%;" onclick="window.location='{{ route('loket1') }}'">
                                    <h1>-</h1>
                                    <span>-</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary small-queue" style="width: 100%; height: 100%;" onclick="window.location='{{ route('loket1') }}'">
                                    <h1>-</h1>
                                    <span>-</span>
                                </button>
                            </div>
                        </div>


                        <!-- Time Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="time-container">
                                    <!-- Time will be displayed here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <br>
            </section> <!-- /.content -->
        </div> <!-- ./wrapper -->

        <!-- Include your scripts as needed -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- JavaScript to update time -->
        <script>
            function updateTime() {
                const now = new Date();
                const timeString = now.toLocaleTimeString('en-US', { hour12: false });
                const dateString = now.toLocaleDateString('id-ID', {
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                });
                document.querySelector('.time-container').innerHTML = timeString + ' <span>' + dateString + '</span>';
            }
            setInterval(updateTime, 1000);
            updateTime();  // Initialize immediately
        </script>
    </body>
</html>
