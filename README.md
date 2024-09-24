# SIMRS (Sistem Informasi Manajemen Rumah Sakit)

## Deskripsi
SIMRS adalah aplikasi manajemen informasi rumah sakit yang dibangun dengan PHP 8.3. Aplikasi ini bertujuan untuk membantu pengelolaan data pasien, jadwal dokter, dan administrasi rumah sakit dengan lebih efisien.

## Fitur Utama
- **Manajemen Data Pasien**: Menyimpan, mengedit, dan menghapus data pasien dengan mudah.
- **Penjadwalan Dokter**: Membantu dalam pengaturan jadwal praktik dokter.
- **Pengelolaan Rekam Medis**: Memungkinkan akses dan pembaruan rekam medis pasien.
- **Laporan Kesehatan**: Menyediakan laporan analitis terkait kesehatan pasien.
- **Notifikasi dan Pemberitahuan**: Mengingatkan jadwal kunjungan dan pengobatan.

## Persyaratan Sistem
- PHP >= 8.3
- Composer
- Database (MySQL/MariaDB)
- Web Server (Apache/Nginx)

## Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/repo-simrs.git
   cd repo-simrs
   
2. **Instal Dependensi**
   ```bash
   composer install

3. **Konfigurasi Database**
   -   Salin file .env.example menjadi .env dan sesuaikan konfigurasi database.
       ```bash
       cp .env.example .env
   -  Ubah konfigurasi database di file .env:makefile
      ```bash
         DB_CONNECTION=mysql
         DB_HOST=127.0.0.1
         DB_PORT=3306
         DB_DATABASE=nama_database
         DB_USERNAME=username
         DB_PASSWORD=password

4. **Generate Kunci Aplikasi**
   ```bash
   php artisan key:generate

5. **Migrasi Database**
   ```bash
   php artisan migrate

6. **Jalankan Aplikasi**
   ```bash
   php artisan serve

Akses aplikasi di http://localhost:8000.

## Penggunaan
Setelah instalasi, Anda dapat mendaftar sebagai pengguna dan mulai menggunakan aplikasi. Fitur-fitur utama dapat diakses dari dashboard. Untuk admin, Anda dapat mengelola semua data rumah sakit melalui panel admin.

## Kontribusi
Jika Anda ingin berkontribusi, silakan lakukan fork pada repositori ini, buat cabang baru (git checkout -b feature-xyz), dan kirim pull request. Pastikan untuk mengikuti pedoman pengkodean yang telah ditentukan.

## Lisensi
Proyek ini dilisensikan di bawah [SIMRS License](License.md). Penggunaan komersial, modifikasi, dan distribusi tidak diperbolehkan.


## Penjelasan Tambahan:
- **Deskripsi**: Memperjelas tujuan aplikasi dan penggunaannya.
- **Fitur Utama**: Menggambarkan kemampuan utama aplikasi.
- **Persyaratan Sistem**: Menyediakan daftar perangkat lunak yang diperlukan untuk menjalankan aplikasi.
- **Instalasi**: Langkah-langkah terperinci untuk menginstal aplikasi, termasuk konfigurasi database.
- **Penggunaan**: Menjelaskan bagaimana pengguna dapat mulai menggunakan aplikasi setelah diinstal.
- **Kontribusi**: Mendorong pengembang lain untuk berkontribusi dengan memberi panduan tentang cara berkontribusi.
- **Lisensi**: Menjelaskan lisensi yang digunakan untuk proyek, memberi informasi kepada pengguna tentang hak penggunaan.
- **Kontak**: Menyediakan informasi untuk menghubungi pengembang untuk pertanyaan atau masalah.
