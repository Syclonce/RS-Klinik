@extends('template.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <!-- Chart Section -->
                                    <div class="col-md-6">

                                            <br>
                                            <br>
                                        <div class="box" style="height: 200px; overflow: hidden;">
                                            <div class="box-body">
                                                <canvas id="patientChart" style="width:100%; height: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text Section -->
                                    <div class="col-md-6">
                                        <div class="text-center">
                                            <button class="btn btn-info" id="connectBPJSButton" data-status="disconnected">Load</button>

                                            <br>
                                            <br>
                                            <br>
                                            <h3>Pasien Klinik Total</h3>

                                            @foreach ($patientData as $data)
                                                <p>
                                                    <span style="color: {{ $data['color'] }};">
                                                        <i class="fa fa-square"></i> {{ $data['label'] }}
                                                    </span>
                                                    : {{ $data['count'] }} Pasien
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Time and Patient Data Cards -->
                    <div class="col-md-6">
                        <div class="row">
                            @foreach ($timeStats as $stat)
                                <div class="col-md-6">
                                    <div class="info-box bg-light">
                                        <span class="info-box-icon"><i class="fa {{ $stat['icon'] }}"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $stat['title'] }}</span>
                                            @if (isset($stat['time']))
                                                <span class="info-box-number">{{ $stat['time'] }}</span>
                                            @else
                                                <span class="info-box-number">{{ $stat['count'] }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Financial Information -->
                    @foreach ($financialData as $financial)
                        <div class="col-md-6 mb-3">
                            <div class="info-box bg-light p-3 text-center">
                                <div class="info-box-content">
                                    <span class="info-box-text d-block">{{ $financial['label'] }}</span>
                                    <span class="info-box-number d-block" style="color: {{ $financial['color'] }};">{{ $financial['amount'] }}</span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>




                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        $(document).ready(function() {
            var button = $('#connectBPJSButton');

            function checkConnectionStatus() {
                $.ajax({
                    url: '/cekstatusconkesi', // Your endpoint URL
                    method: 'GET', // Use 'POST' if you're sending data
                    success: function(response) {
                        // Update button status and text based on the response
                        if (response.status === 'connect') {
                            button.text('Terhubung BPJS'); // Change button text
                            button.data('status', 'connected'); // Update data-status
                        } else {
                            button.text('Tidak Terhubung BPJS'); // Change button text
                            button.data('status', 'disconnected'); // Update data-status
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred: ' + error);
                        button.text('Tidak Terhubung BPJS'); // Change button text
                        button.data('status', 'disconnected'); // Update data-status
                    }
                });
            }

            // Initial check on page load
            checkConnectionStatus();

            // Check connection status when the button is clicked
            button.on('click', function() {
                checkConnectionStatus();
            });
        });
        </script>



    <script>
        var ctx = document.getElementById('patientChart').getContext('2d');
        var patientChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Rawat Jalan', 'Apotek'], // Example labels
                datasets: [{
                    data: [3353, 2089], // Example data
                    backgroundColor: ['#3c8dbc', '#f39c12'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Prevents aspect ratio distortion
                cutoutPercentage: 70,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>

@endsection
