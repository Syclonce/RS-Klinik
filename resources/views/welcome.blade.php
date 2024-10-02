<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php
    $setweb = App\Models\setweb::first();
  @endphp
  <title>{{  $setweb->name_app }}</title>

  <link rel="icon" sizes="180x180" type="image/x-icon" href="{{ asset('webset/' . $setweb->logo_app) }}">
  <!-- Include styles and scripts as needed -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <style>
    html, body {
      height: 100%; /* Set full height */
      margin: 0; /* Remove default margin */
    }

    .wrapper {
      min-height: 100vh; /* Set minimum height for the wrapper */
    }

    .content-wrapper {
      min-height: calc(100vh - 56px); /* Adjust height for navbar and footer */
    }

    .content {
      padding: 20px; /* Add padding to content */
    }
  </style>
  <!-- CSS tambahan untuk penataan -->
<style>
    .profil-perusahaan, .visi-misi, .tim-manajemen,  {
        padding: 15px;

        margin-bottom: 20px;
    }

    h3 {
        color: #333;
        margin-bottom: 15px;
    }

    h5 {
        margin-top: 15px;
    }

    p {
        line-height: 1.5;
    }
</style>
<!-- CSS tambahan untuk penataan -->
<style>
    .profil-perusahaan {
        padding: 15px;
        margin-bottom: 20px;
    }

    .profil-perusahaan h5 {
        text-align: center; /* Menyelaraskan judul ke tengah */
    }

    .profil-perusahaan p {
        line-height: 1.5;
    }
</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="{{ asset('webset/' . $setweb->logo_app) }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $setweb->name_app }} Dolphi</span>
      </a>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-primary btn-sm mr-2">Login</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('register') }}" class="btn btn-success btn-sm">Registrasi</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <div class="mt-3 col-12">

                   <!-- Profil Perusahaan -->
                    <div class="profil-perusahaan">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('webset/' . $setweb->logo_app) }}" alt="Logo Perusahaan" class="img-fluid mb-3" style="width: 500px; height: auto;">
                            </div>
                            <div class="col-md-6">
                                <h5><strong>dolphin healthtech</strong></h5>
                                <p><strong>Nation & life Through Accelerated Digital Transformation and Inovation for Any Bussiness, Organization, and Industry</strong></p>
                            </div>
                        </div>
                    </div>
                    <!-- Visi dan Misi -->
                    <div class="visi-misi mt-4">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <div class="card" style="height: 100%;">
                                    <div class="card-heder">
                                        <h5><strong>Misi:</strong></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Mampu meningkatkan pelayanan / services kepada pasien yang datang, sehingga penanganan medis dan non medis terhadap pasien dapat dilakukan lebih cepat dan profesional, hal ini mampu memberikan dampak yang besar terhadap Citra Rumah Sakit.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="height: 100%;">
                                    <div class="card-heder">
                                        <h5><strong>Visi:</strong></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">Memberikan dukungan di dalam melakukan kontrol logistik untuk menjadi lebih baik lagi, baik di bagian gudang, apotik, poli, laboratorium dan di bagian umum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tim-manajemen mt-4 text-center">
                        <h3>Dolphin Our Team</h3>
                        <br>
                    </div>
                    <!-- Tim Manajemen Carousel -->
                    <div id="timManajemenCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
                        <div class="carousel-inner text-center">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Nama Manajer 3" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>DR. MISBAHUL MUNIR</h5>
                                                <p>Komisaris Utama</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Hemat.png') }}" alt="Nama Manajer 4" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>HEMAT DWI NURYANTO</h5>
                                                <p>Komisaris</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Mochamad.png') }}" alt="Nama Manajer 5" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>MOCHAMAD ZHUHRIANSYAH RAHMAN</h5>
                                                <p>Komisaris</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Yudi.png') }}" alt="Nama Manajer 1" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>YUDI JUHANDIANSYAH</h5>
                                                <p>Direktur Utama</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/avatar2.png') }}" alt="Nama Manajer 2" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>DEVAQI ARUM SARI</h5>
                                                <p>Direktur</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="row justify-content-center">

                                    <div class="col-md-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Diah.png') }}" alt="Nama Manajer 6" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>Diah Ayu Pujiastuti</h5>
                                                <p>Administrasi Keuangan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Deva.png') }}" alt="Nama Manajer 6" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>Deva Indrayana Rahmat</h5>
                                                <p>Support Team</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Sugih.png') }}" alt="Nama Manajer 6" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>Sugih Nugroho Wibisono</h5>
                                                <p>Jabatan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/Aditama.png') }}" alt="Nama Manajer 6" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>Muhammad Aditama</h5>
                                                <p>Jabatan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card shadow-lg border-0">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('dist/img/avatar5.png') }}" alt="Nama Manajer 6" class="img-fluid rounded-circle mb-4" style="max-width: 120px; height: auto;">
                                                <h5>Nama Manajer 5</h5>
                                                <p>Jabatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Additional slides if needed -->
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#timManajemenCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#timManajemenCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <br>
    </section>

    <br>
    <!-- /.content -->
</div>


  <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer" style="padding: 20px; position: relative; bottom: 0; width: 100%;">
            <div class="container" style="max-width: 1200px; margin: auto;">
                <!-- Kontak dan Lokasi dalam satu baris -->
                <div class="d-flex justify-content-between align-items-start">
                    <div class="kontak-kami" style="flex: 1; margin-right: 20px;">
                        <h3>Kontak Kami</h3>
                        <p><strong>Email:</strong> info@dolphinhealthtech.co.id</p>
                        <p><strong>Telepon:</strong> 085220561527</p>
                        <p><strong>Alamat:</strong> Jl. Bungur No.9, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162</p>
                    </div>

                    <div class="lokasi-kami" style="flex: 1; margin-left: 20px;">
                        <div style="width: 100%; height: 200px; border: 1px solid #dee2e6;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0704240580003!2d107.59200887604698!3d-6.882167193116727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e68c7ea64fe3%3A0xaa2a71db41907961!2sJl.%20Bungur%20No.9%2C%20Cipedes%2C%20Kec.%20Sukajadi%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040162!5e0!3m2!1sen!2sid!4v1727770980358!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

                <!-- Teks Copyright di Tengah -->
                <div class="text-center mt-4">
                    <strong>{{ $setweb->name_app }} Copyright &copy; <?= date('Y') ?></strong>
                </div>
            </div>
        </footer>
</div>
<!-- ./wrapper -->

<!-- Include your scripts as needed -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Include Bootstrap JS for carousel functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom Script to handle smooth swipe gestures -->
<script>
    // Smooth transition
    document.querySelector('#timManajemenCarousel').addEventListener('slid.bs.carousel', function () {
        const carouselItems = document.querySelectorAll('.carousel-item');
        carouselItems.forEach(item => {
            item.classList.add('transition-smooth');
        });
    });

    // Add swipe gesture support
    const carousel = document.querySelector('#timManajemenCarousel');
    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    carousel.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        if (touchEndX < touchStartX) {
            $('#timManajemenCarousel').carousel('next');
        }
        if (touchEndX > touchStartX) {
            $('#timManajemenCarousel').carousel('prev');
        }
    }

    // Adjust the carousel transition duration (smoothness)
    const style = document.createElement('style');
    style.innerHTML = `
        .carousel-item {
            transition: transform 0.6s ease-in-out;
        }
    `;
    document.head.appendChild(style);
</script>
</body>
</html>
