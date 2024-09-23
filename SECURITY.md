# Security Policy

## Supported Versions

Use this section to tell people about which versions of your project are
currently being supported with security updates.

| Version | Supported          |
| ------- | ------------------ |
| 5.1.x   | :white_check_mark: |
| 5.0.x   | :x:                |
| 4.0.x   | :white_check_mark: |
| < 4.0   | :x:                |

## Reporting a Vulnerability

Use this section to tell people how to report a vulnerability.

Tell them where to go, how often they can expect to get an update on a
reported vulnerability, what to expect if the vulnerability is accepted or
declined, etc.


## Keamanan

Keamanan aplikasi adalah prioritas utama. Berikut adalah beberapa praktik yang direkomendasikan untuk menjaga keamanan SIMRS:

### 1. Pembaruan Rutin
- Selalu perbarui aplikasi dan semua dependensinya secara teratur untuk mengatasi kerentanan yang diketahui.

### 2. Gunakan HTTPS
- Pastikan aplikasi diakses melalui HTTPS untuk melindungi data yang ditransfer antara klien dan server.

### 3. Validasi dan Sanitasi Input
- Selalu validasi dan sanitasi input pengguna untuk mencegah serangan seperti SQL Injection dan Cross-Site Scripting (XSS).

### 4. Manajemen Kunci dan Rahasia
- Jangan pernah menyimpan kunci API, kata sandi, atau informasi sensitif dalam kode. Gunakan file `.env` untuk mengelola rahasia aplikasi.

### 5. Penggunaan CSRF Token
- Pastikan untuk menggunakan token CSRF (Cross-Site Request Forgery) untuk melindungi formulir dan permintaan yang mengubah data.

### 6. Audit Log
- Implementasikan audit log untuk mencatat semua aktivitas yang signifikan di aplikasi, termasuk login, pengeditan data, dan penghapusan.

### 7. Pengaturan Permission
- Terapkan kontrol akses yang tepat untuk memastikan bahwa pengguna hanya dapat mengakses data dan fungsi yang diizinkan.

### 8. Pengujian Keamanan
- Lakukan pengujian keamanan secara berkala, termasuk pengujian penetrasi, untuk mengidentifikasi dan memperbaiki kerentanan.

### 9. Backup Data
- Lakukan backup data secara rutin untuk mencegah kehilangan data akibat serangan atau kegagalan sistem.

### 10. Edukasi Pengguna
- Berikan edukasi kepada pengguna tentang praktik keamanan yang baik, seperti penggunaan kata sandi yang kuat dan penghindaran phishing.

Dengan mengikuti praktik keamanan ini, Anda dapat membantu menjaga aplikasi SIMRS tetap aman dari berbagai ancaman.

