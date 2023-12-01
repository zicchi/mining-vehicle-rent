# Aplikasi Mining

Deskripsi singkat tentang aplikasi Anda.

## Informasi Aplikasi

- **PHP Version**: 8.2.0
- **Database Version**: MariaDB 10.4.27
- **Framework**: Laravel 10.34.2

## Instalasi

Langkah-langkah untuk menginstal aplikasi:

1. Clone repository: `git clone [URL Repository]`
2. Install dependensi: `composer install`
3. Salin `.env.example` ke `.env` dan sesuaikan konfigurasi database
4. Jalankan migrasi database: `php artisan migrate`
5. Jalankan app key generate: `php artisan key:generate`

## Akun Demo

Untuk mencoba aplikasi, Anda dapat menggunakan akun demo berikut:

Akun Admin Pusat
- **Username**: admin
- **Password**: admin
Akun Admin Tambang 1
- **Username**: admin_1
- **Password**: admin
Akun Branch Manager 
- **Username**: branch_manager
- **Password**: 123456
Akun Manager Tambang 1
- **Username**: site_manager
- **Password**: 123456

## Panduan Penggunaan
- Admin Pusat bisa CRUD semua data master
- Branch Manager dan Site Manager berfungsi untuk melihat laporan, melihat dashboard grafik dan menyetujui persewaan
- Admin Tambang berfungsi untuk mengajukan proses persewaan kendaraan

