<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

<h1 align="center">GARUDA FUTSALL ARENA</h1>
<h3 align="center">— Management System —</h3>

<p align="center">
  Platform manajemen penyewaan lapangan futsal berbasis web yang modern, cepat, dan mudah digunakan.<br>
  Dibangun dengan <strong>Laravel 13</strong> dan <strong>Tailwind CSS</strong>.
</p>

---

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Cara Instalasi](#cara-instalasi)
- [Akun Default](#akun-default)
- [Panduan Penggunaan Admin](#panduan-penggunaan-admin)
- [Design Reference](#design-reference)
- [Authors & Contributors](#authors--contributors)
- [Lisensi](#lisensi)

---

## Tentang Proyek

**GARUDA FUTSALL ARENA** adalah sistem manajemen arena futsal yang komprehensif, mencakup seluruh alur operasional mulai dari reservasi lapangan, verifikasi pembayaran, manajemen lapangan, hingga laporan keuangan berbasis grafik interaktif. Dirancang dengan UI bergaya **Glassmorphism** yang futuristik dan fully responsive.

---

## Fitur Utama

| Fitur | Deskripsi |
|---|---|
| **Dashboard Real-time** | Pantau pendapatan harian, slot aktif, dan okupansi lapangan secara live |
| **Manajemen Booking** | Kelola reservasi, verifikasi bukti pembayaran (foto), dan konfirmasi status |
| **Manajemen Lapangan** | Tambah, edit, dan kelola berbagai jenis lapangan (Indoor / Outdoor) |
| **Laporan Performa** | Analisis pendapatan bulanan & tahunan dengan grafik interaktif |
| **Export CSV** | Unduh data transaksi ke Excel dengan format rapi dan profesional |
| **Multi-Admin** | Kelola akun admin tambahan dengan hak akses yang terintegrasi |
| **UI Modern** | Desain Glassmorphism futuristik, responsif di semua perangkat |

---

## Persyaratan Sistem

Pastikan environment Anda memenuhi persyaratan berikut sebelum instalasi:

- **PHP** >= 8.3
- **Composer** (versi terbaru)
- **MySQL** / MariaDB
- **Node.js** & NPM

---

## Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/your-repo/garuda-futsall.git
cd garuda-futsall
```

### 2. Instal Dependensi

```bash
composer install
npm install && npm run build
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

> Buka file `.env` dan sesuaikan konfigurasi database:
> `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

### 4. Migrasi & Seed Data

```bash
php artisan migrate --seed
```

### 5. Jalankan Server

```bash
php artisan serve
```

Aplikasi akan berjalan di: `http://127.0.0.1:8000`

---

## Akun Default

Setelah menjalankan seeder, gunakan akun berikut untuk login:

| Field | Value |
|---|---|
| **Username** | `putsall123` |
| **Password** | `putsall123` |

> **Penting:** Segera ganti password setelah login pertama kali untuk keamanan sistem.

---

## Panduan Penggunaan Admin

1. **Login** — Masuk menggunakan akun admin yang telah terdaftar.
2. **Verifikasi Bukti Bayar** — Buka menu **Booking**, klik ikon gambar *(Bukti)* untuk melihat foto transfer yang dikirim oleh pemesan.
3. **Konfirmasi Booking** — Klik ikon centang untuk mengonfirmasi booking apabila bukti pembayaran sudah valid.
4. **Export Laporan** — Gunakan tombol **Export CSV** di halaman Dashboard atau Reports untuk mengunduh laporan bulanan.

---

## Design Reference

Referensi desain UI/UX sistem ini dapat diakses melalui:

[Figma Design — Garuda Futsall Arena](https://www.figma.com/design/0ppDoxsrhH5Qd6VoFiWhPw/Untitled?node-id=0-1&t=Y4j3WYPlkrE6gMeW-1)

---

## Authors & Contributors

Proyek ini dikembangkan dengan penuh dedikasi oleh tim:

| Nama | GitHub |
|---|---|
| **Shac1x** | [@shac1x](https://github.com/shac1x) |
| **Firza Aditiya** | [@firzaaditiya](https://github.com/firzaaditiya) |
| **Manap01** | [@manap01](https://github.com/manap01) |

---

## Lisensi

Sistem ini merupakan perangkat lunak open-source yang dirilis di bawah lisensi **[MIT License](https://opensource.org/licenses/MIT)**.

---

<p align="center">
  Dibuat dengan semangat oleh Tim Garuda Futsall &mdash; 2025
</p>
