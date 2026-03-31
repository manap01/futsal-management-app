<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🏟️ GARUDA FUTSALL ARENA - Management System

GARUDA FUTSALL ARENA adalah platform manajemen penyewaan lapangan futsal berbasis web yang modern, cepat, dan mudah digunakan. Dibangun dengan Laravel 13 dan Tailwind CSS, sistem ini menawarkan pengalaman manajemen arena yang komprehensif mulai dari reservasi hingga laporan keuangan.

## 🚀 Fitur Utama

- **Dashboard Real-time**: Pantau pendapatan harian, slot aktif, dan okupansi lapangan secara live.
- **Manajemen Booking**: Kelola reservasi dengan mudah, verifikasi bukti pembayaran (foto), dan konfirmasi status.
- **Manajemen Lapangan**: Tambah, edit, dan kelola berbagai jenis lapangan (Indoor/Outdoor).
- **Laporan Performa**: Analisis pendapatan bulanan dan tahunan dengan grafik interaktif.
- **Export CSV**: Unduh data transaksi ke Excel dengan format yang rapi dan profesional.
- **Multi-Admin**: Kelola akun admin tambahan dengan hak akses yang terintegrasi.
- **UI Modern**: Desain Glassmorphism yang futuristik dan responsif.

## 👥 Authors & Contributors

Kami bangga mempersembahkan proyek ini yang dikembangkan oleh tim:

- **Shac1x** - [GitHub Profile](https://github.com/shac1x)
- **Firza Aditiya** - [GitHub Profile](https://github.com/firzaaditiya)
- **Manap01** - [GitHub Profile](https://github.com/manap01)

## 🎨 Design Reference

Sistem ini mengikuti panduan desain modern yang dapat dilihat pada:
[Figma Design Link](https://www.figma.com/design/0ppDoxsrhH5Qd6VoFiWhPw/Untitled?node-id=0-1&t=Y4j3WYPlkrE6gMeW-1)

## 🛠️ Persyaratan Sistem

- PHP >= 8.3
- Composer
- MySQL / MariaDB
- Node.js & NPM

## ⚙️ Cara Instalasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/your-repo/garuda-futsall.git
   cd garuda-futsall
   ```

2. **Instal Dependensi**
   ```bash
   composer install
   npm install && npm run build
   ```

3. **Konfigurasi Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Pastikan konfigurasi `DB_HOST`, `DB_DATABASE`, dll. sudah sesuai di file `.env`.*

4. **Migrasi & Seed Data**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan Server**
   ```bash
   php artisan serve
   ```

## 📖 Panduan Penggunaan Admin

- **Login**: Masuk menggunakan akun admin yang telah didaftarkan.
- **Verifikasi Bukti**: Buka menu **Booking**, klik ikon gambar (Bukti) untuk melihat foto transfer yang dikirim pemboking.
- **Konfirmasi**: Klik ikon centang untuk mengonfirmasi boking jika bukti pembayaran sudah valid.
- **Export Data**: Gunakan tombol **Export CSV** di Dashboard atau Reports untuk laporan bulanan.

## 📜 License

Sistem ini adalah software open-source di bawah lisensi [MIT License](https://opensource.org/licenses/MIT).
