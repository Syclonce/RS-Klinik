<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemanggil Antrian Loket</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Menggunakan Font Awesome 6 -->
    <style>
        body {
            background-color: #007bff; /* Latar belakang biru */
        }
        .container {
            margin-top: 50px;
        }
        .queue-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .queue-number {
            font-size: 5rem;
            font-weight: bold;
            color: black;
        }
        .loket-text {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-box {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .btn-box .equal-button {
            flex: 1; /* Membuat setiap tombol memiliki lebar yang sama */
            margin: 0 5px; /* Memberikan jarak antar tombol */
            height: 60px; /* Menentukan tinggi tombol agar seragam */
            font-size: 1.5rem; /* Mengatur ukuran font untuk konsistensi */
        }
        .input-group {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        .instructions {
            font-size: 0.9rem;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="queue-box">
                <div class="loket-text">Loket 3</div>
                <div class="queue-number" id="current-queue-number">F2</div>

                <!-- Tombol Pemanggilan -->
                <div class="btn-box">
                    <button class="btn btn-info btn-lg btn-icon equal-button" onclick="previousQueue()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn btn-secondary btn-lg equal-button" onclick="showPopup()">
                        <i class="fa-solid fa-volume-high" style="color: #74C0FC;"></i>
                    </button>
                    <button class="btn btn-info btn-lg btn-icon equal-button" onclick="nextQueue()">
                        <i class="fa-solid fa-forward" style="color: #74C0FC;"></i>
                    </button>
                </div>


                <!-- Input Nomor RM -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Input Nomor RM">
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Input Nomor Antrian -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Input Nomor Antrian" id="input-antrian">
                <div class="input-group-append">
                    <button class="btn btn-danger" type="button" onclick="callQueue()">Panggil</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Petunjuk -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            <p class="instructions">
                • Klik tombol ➤ 1x untuk memanggil antrian selanjutnya <br>
                • Klik tombol 🔊 1x untuk memanggil ulang antrian <br>
                • Untuk menyesuaikan urutan, masukkan nomor urut pada kolom lompat dan klik tombol panggil 1x
            </p>
        </div>
    </div>
</div>

<!-- Pop-up untuk Konfirmasi -->
<div class="modal fade" id="popupModal" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda ingin memanggil ulang antrian <span id="current-queue-number-popup"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="callAgain()">Ya, Panggil Ulang</button>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            function showPopup() {
                const currentQueueNumber = document.getElementById('current-queue-number').innerText;
                document.getElementById('current-queue-number-popup').innerText = currentQueueNumber;
                $('#popupModal').modal('show');
            }

            function callAgain() {
                alert('Antrian ' + document.getElementById('current-queue-number').innerText + ' telah dipanggil ulang.');
                $('#popupModal').modal('hide');
            }

            function nextQueue() {
                const currentNumber = document.getElementById('current-queue-number');
                currentNumber.innerText = getNextQueueNumber(currentNumber.innerText);
            }

            function previousQueue() {
                const currentNumber = document.getElementById('current-queue-number');
                currentNumber.innerText = getPreviousQueueNumber(currentNumber.innerText);
            }

            function getNextQueueNumber(current) {
                let next = parseInt(current.slice(1)) + 1;
                return 'F' + next;
            }

            function getPreviousQueueNumber(current) {
                let prev = parseInt(current.slice(1)) - 1;
                return 'F' + prev;
            }

            function callQueue() {
                const queueNumber = document.getElementById('input-antrian').value;
                alert('Antrian ' + queueNumber + ' telah dipanggil.');
            }
        </script>
    </body>
</html>
