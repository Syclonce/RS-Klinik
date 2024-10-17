@extends('template.app')

@section('content')

<style>

    #qrCode {

        object-fit: contain; /* Maintain aspect ratio */
        text-align: center; /* Center the image and status text */
    }

    #status {
        margin-top: 10px; /* Add some space between image and status */
        font-size: 16px; /* Adjust font size */
        color: #333; /* Text color */
    }
            /* Style for QR code container */
</style>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="text-center">
                                    <h2 class="mb-4">License Key</h2>
                                    <div class="mt-3">
                                        <p>Status: <span id="status_gatewaywa"></span></p>
                                        <img id="statusGif" src="" alt="Status GIF" style="display: none;"/>
                                    </div>
                                </div>
                                <div class="mt-3 text-center">
                                    <label for="licenseKeyInput">License Key:</label>
                                    <input type="text" id="licenseKeyInput" name="licenseKey" class="form-control" required value="{{ old('licenseKey', $licenseKey) }}">
                                    <br>
                                    <button id="saveLicenseKeyBtn" class="btn btn-primary">Save License Key</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="text-center">
                                    <h2 class="mb-4">WhatsApp Gateway</h2>
                                    <div id="qrCodeContainer" style="display: none;"></div>
                                        {{-- <img id="qrCode" alt="QR Code" src="https://cdn.pixabay.com/photo/2012/04/12/22/25/warning-sign-30915_960_720.png" /> --}}
                                        <div id="qrCode" style="display: flex; justify-content: center; align-items: center;"></div>

                                        <div id="status">Status: No connection</div>
                                    <div>
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <button id="startWhatsAppBtn" class="ml-2 btn btn-primary">Start Wahtsapp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        $(document).ready(function() {
            $('#qrCode').html('<img src="https://media1.giphy.com/media/EZnSvdWR2k5jYljjp4/giphy.gif" alt="Pending Service GIF" width="128" height="128"/>');

            // Function to check license validity
            function checkLicenseValidity() {
                const licenseKey = $('#licenseKeyInput').val();

                if (licenseKey) {
                    $.ajax({
                        url: 'http://localhost:3002/api/valid-license', // Your Node.js server URL
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({ licenseKey }),
                        success: function(response) {
                            $('#status_gatewaywa').text(response.message);
                            // Optionally handle the response based on validity
                            if (response.status == '1') {
                                $('#status_gatewaywa').css('color', 'green'); // Change text color to red for invalid
                            } else {
                                $('#status_gatewaywa').css('color', 'red'); // Change text color to green for valid
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#status_gatewaywa').text('Error: ' + xhr.responseText);
                        }
                    });
                } else {
                    $('#status_gatewaywa').text('Please enter a license key.').css('color', 'orange');
                }
            }

            function fetchQRCode() {
                $.ajax({
                    url: 'http://localhost:3002/api/get-qr-code', // Your endpoint to get the QR code
                    type: 'GET',
                    success: function(response) {
                        if (response.status === 'ready') {
                            $('#status').text('WhatsApp is already active.').css('color', 'orange');
                            // Set a placeholder GIF when the service is ready
                            $('#qrCode').html('<img src="https://i.pinimg.com/originals/d2/2a/47/d22a47fad2d210bf3e5a8e069bb68fb7.gif" alt="Loading GIF" width="128" height="128"/>');
                        } else if (response.status === 'success') {
                            // Check if the QR code data is valid
                            if (response.qrCode) {
                                // Clear any previous content in the QR code element
                                $('#qrCode').html(''); // Clear previous QR code or image

                                // Create the QR code and attach it to a specific DOM element
                                var qrcodeElement = document.getElementById('qrCode');

                                // Generate the QR code with the given data
                                var qrcode = new QRCode(qrcodeElement, {
                                    text: response.qrCode
                                });

                                console.log("QR Code Data:", response.qrCode); // Debugging line

                                // Update the status message to prompt the user
                                $('#status').text('Please scan the QR code.').css('color', 'orange');
                            } else {
                                // If no valid QR code data, display an error message
                                $('#status').text('Invalid QR code data.').css('color', 'red');
                                console.error("Invalid QR code data:", response.qrCode); // Log error for debugging
                            }
                        } else {
                            // Fallback if the service is pending or not ready
                            $('#qrCode').html('<img src="https://media1.giphy.com/media/EZnSvdWR2k5jYljjp4/giphy.gif" alt="Pending Service GIF" width="128" height="128"/>');
                            $('#status').text('WhatsApp pending service.').css('color', 'orange');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error for debugging
                        $('#status').text('Error fetching QR Code: ' + xhr.responseText).css('color', 'red');
                    }
                });
            }
            // Set an interval to check validity every 10 seconds
            setInterval(checkLicenseValidity, 20000);
            setInterval(fetchQRCode, 20000);
        });

        $(document).ready(function() {
            let licenseKey = '';
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#saveLicenseKeyBtn').on('click', function() {
                licenseKey = $('#licenseKeyInput').val();

                $.ajax({
                    url: 'http://localhost:3002/api/valid-license', // Your Node.js server URL
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ licenseKey }),
                    success: function(response) {

                        // If license validation is successful, save it to the database
                        if (response.status === '1') {
                            $.ajax({
                                url: '/save-license-key', // Your Laravel route to save the license key
                                type: 'POST',
                                contentType: 'application/json',
                                headers: {
                                'X-CSRF-TOKEN': csrfToken
                                },
                                data: JSON.stringify({ license_key: licenseKey }),
                                success: function(saveResponse) {
                                    $('#status_gatewaywa').text(saveResponse.message);
                                },
                                error: function(xhr, status, error) {
                                    $('#status_gatewaywa').text('Error saving license key: ' + xhr.responseText);
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#status_gatewaywa').text('license Not Valid ');
                    }
                });
            });
        });
    </script>
@endsection
