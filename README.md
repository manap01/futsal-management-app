<div align="center">

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=220&section=header&text=GARUDA%20FUTSAL%20ARENA&fontSize=52&fontColor=ffffff&animation=twinkling&fontAlignY=38&desc=Modern%20Futsal%20Management%20System%20%7C%20Laravel%2013&descAlignY=62&descSize=18" width="100%"/>

<br/>

<a href="https://git.io/typing-svg">
  <img src="https://readme-typing-svg.demolab.com?font=Fira+Code&weight=700&size=18&pause=1200&color=FF6B35&center=true&vCenter=true&multiline=true&repeat=true&width=750&height=70&lines=Built+with+Laravel+13+%2B+Tailwind+CSS;Real-time+Dashboard+%7C+Smart+Booking+System;Glassmorphism+UI+%7C+Fully+Responsive+Design" alt="Typing SVG"/>
</a>

<br/><br/>

![Laravel](https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38BDF8?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

<br/>

![Status](https://img.shields.io/badge/Status-Production%20Ready-success?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)
![Version](https://img.shields.io/badge/Version-1.0.0-blue?style=for-the-badge)
![Build](https://img.shields.io/badge/Build-Passing-brightgreen?style=for-the-badge&logo=github-actions&logoColor=white)

</div>

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Tech Stack](#-tech-stack)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Akun Default](#-akun-default)
- [Panduan Admin](#-panduan-penggunaan-admin)
- [Struktur Folder](#-struktur-folder)
- [Design Reference](#-design-reference)
- [Contributors](#-contributors)
- [Lisensi](#-lisensi)

---

## 🏟️ Tentang Proyek

**Garuda Futsal Arena** adalah sistem manajemen arena futsal yang komprehensif dan modern, dibangun di atas fondasi **Laravel 13**. Platform ini mendigitalisasi seluruh alur operasional arena — mulai dari reservasi lapangan, verifikasi pembayaran, hingga laporan keuangan — dalam satu antarmuka yang terintegrasi dan responsif.

> Cocok untuk skala kecil maupun besar. Siap produksi tanpa konfigurasi tambahan.

---

## ✨ Fitur Utama

| No | Fitur | Deskripsi | Status |
|:--:|:------|:----------|:------:|
| 1 | **Dashboard Real-time** | Monitor pendapatan, slot aktif & tingkat okupansi secara live | ✅ |
| 2 | **Manajemen Booking** | Kelola reservasi, verifikasi bukti transfer, & konfirmasi status | ✅ |
| 3 | **Manajemen Lapangan** | Tambah & kelola lapangan Indoor / Outdoor beserta statusnya | ✅ |
| 4 | **Laporan Performa** | Grafik pendapatan interaktif per bulan / per tahun | ✅ |
| 5 | **Export CSV / Excel** | Unduh seluruh data transaksi dengan satu klik | ✅ |
| 6 | **Multi-Admin** | Manajemen akun admin dengan hak akses terintegrasi | ✅ |
| 7 | **UI Glassmorphism** | Desain modern, futuristik, dan fully responsive | ✅ |

---

## 🛠️ Tech Stack

### Backend
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)

### Frontend
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)
![Blade](https://img.shields.io/badge/Blade_Template-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![Chart.js](https://img.shields.io/badge/Chart.js-FF6384?style=flat-square&logo=chartdotjs&logoColor=white)

### Tools & DevOps
![Composer](https://img.shields.io/badge/Composer-885630?style=flat-square&logo=composer&logoColor=white)
![NPM](https://img.shields.io/badge/NPM-CB3837?style=flat-square&logo=npm&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=flat-square&logo=git&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-181717?style=flat-square&logo=github&logoColor=white)
![VS Code](https://img.shields.io/badge/VS_Code-007ACC?style=flat-square&logo=visual-studio-code&logoColor=white)
![Figma](https://img.shields.io/badge/Figma-F24E1E?style=flat-square&logo=figma&logoColor=white)

---

## 💻 Persyaratan Sistem

| Dependensi | Versi Minimum |
|:-----------|:-------------:|
| PHP        | `>= 8.3`      |
| Composer   | `>= 2.x`      |
| MySQL      | `>= 8.0`      |
| Node.js    | `>= 18.x`     |
| NPM        | `>= 9.x`      |

---

## 🚀 Instalasi

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

Sesuaikan konfigurasi database di file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=garuda_futsall
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi & Seed Database

```bash
php artisan migrate --seed
```

### 5. Jalankan Server

```bash
php artisan serve
```

> Aplikasi berjalan di **`http://127.0.0.1:8000`**

---

## 🔑 Akun Default

Setelah seeder berhasil dijalankan, gunakan kredensial berikut untuk login pertama kali:

| Field    | Value         |
|:--------:|:-------------:|
| Email    | `putsall123`  |
| Password | `putsall123`  |

> ⚠️ **Peringatan:** Segera ganti password setelah login pertama kali untuk keamanan sistem.

---

## 🛡️ Panduan Penggunaan Admin

### 1. 🔐 Login ke Sistem

1. Buka browser dan akses `http://127.0.0.1:8000/admin/login`
2. Masukkan **Email** dan **Password** admin yang terdaftar
3. Klik tombol **Masuk** — Anda akan diarahkan ke halaman Dashboard
4. Dashboard menampilkan **ringkasan aktivitas hari ini** secara real-time

---

### 2. 📋 Manajemen Booking

Akses menu **Booking Management** dari sidebar untuk mengelola seluruh reservasi.

#### Melihat Daftar Booking
- Tabel menampilkan: nama pemesan, lapangan, jam, tanggal, status pembayaran
- Gunakan filter **tanggal** dan **status** untuk mempersempit pencarian
- Klik ikon **👁️ Eye** untuk melihat detail lengkap sebuah booking

#### Verifikasi Bukti Pembayaran
- Klik ikon **🖼️ Image** pada kolom `Bukti Transfer`
- Foto bukti pembayaran tampil dalam modal — scroll jika gambar panjang
- Pastikan nominal dan rekening tujuan sudah sesuai sebelum konfirmasi

#### Konfirmasi atau Tolak Booking
| Aksi | Tombol | Hasil |
|:-----|:------:|:------|
| Setujui pembayaran | ✅ Check Circle | Status berubah menjadi **Confirmed** (Hijau) |
| Tolak / batalkan | ❌ Cancel | Status berubah menjadi **Cancelled** (Merah) |

---

### 3. 🏟️ Manajemen Lapangan

Akses menu **Courts** dari sidebar.

#### Menambah Lapangan Baru
1. Klik tombol **+ Tambah Lapangan**
2. Isi formulir: nama lapangan, tipe (Indoor / Outdoor), harga per jam
3. Upload foto lapangan *(opsional)*
4. Klik **Simpan**

#### Mengubah Status Lapangan
- Toggle status **Aktif / Non-aktif** langsung dari tabel
- Lapangan non-aktif tidak akan muncul di halaman pemesanan pelanggan

#### Mengedit atau Menghapus Lapangan
- Klik ikon **✏️ Edit** untuk mengubah data lapangan
- Klik ikon **🗑️ Delete** lalu konfirmasi untuk menghapus lapangan

---

### 4. 📊 Laporan & Analitik

Akses menu **Laporan** atau lihat langsung di **Dashboard**.

#### Melihat Grafik Pendapatan
- Pilih rentang waktu: **Harian / Bulanan / Tahunan**
- Grafik batang interaktif menampilkan tren pendapatan per periode
- Hover pada grafik untuk melihat detail nominal per hari/bulan

#### Ringkasan Statistik Dashboard
| Metrik | Keterangan |
|:-------|:-----------|
| Total Pendapatan | Akumulasi pembayaran confirmed hari ini |
| Booking Aktif | Jumlah reservasi berjalan saat ini |
| Tingkat Okupansi | Persentase lapangan terpakai vs total slot |
| Booking Pending | Reservasi yang menunggu verifikasi |

---

### 5. 📥 Export Laporan CSV

1. Buka halaman **Laporan**
2. Pilih **rentang tanggal** yang diinginkan
3. Klik tombol **⬇️ Export CSV**
4. File `.csv` akan otomatis terunduh — dapat dibuka di Excel / Google Sheets

> Data yang diekspor mencakup: ID booking, nama, lapangan, tanggal, jam, total bayar, dan status.

---

### 6. 👤 Manajemen Admin

Akses menu **Admin Management** (hanya tersedia untuk Super Admin).

#### Menambah Akun Admin Baru
1. Klik **+ Tambah Admin**
2. Isi nama, email, dan password
3. Klik **Simpan**

#### Menghapus Akun Admin
- Klik ikon **🗑️ Delete** pada baris admin yang ingin dihapus
- Konfirmasi penghapusan — aksi ini tidak dapat dibatalkan

---

## 📁 Struktur Folder

```
garuda-futsall/
│
├── 📂 app/
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   │   └── 📂 Admin/
│   │   │       ├── AuthController.php          # Login & logout admin
│   │   │       ├── BookingController.php        # Kelola reservasi
│   │   │       ├── CourtController.php          # Kelola lapangan
│   │   │       ├── DashboardController.php      # Data statistik & grafik
│   │   │       └── ReportController.php         # Laporan & export CSV
│   │   └── 📂 Middleware/
│   │       └── AdminAuth.php                    # Guard autentikasi admin
│   ├── 📂 Models/
│   │   ├── Booking.php
│   │   ├── Court.php
│   │   └── User.php
│   └── 📂 Services/
│       └── BookingService.php                   # Business logic reservasi
│
├── 📂 database/
│   ├── 📂 migrations/                           # Skema tabel (auto-generate)
│   │   ├── create_users_table.php
│   │   ├── create_courts_table.php
│   │   └── create_bookings_table.php
│   └── 📂 seeders/
│       ├── DatabaseSeeder.php
│       ├── AdminSeeder.php                      # Akun admin default
│       └── CourtSeeder.php                      # Data lapangan dummy
│
├── 📂 resources/
│   ├── 📂 views/
│   │   └── 📂 admin/
│   │       ├── 📂 layouts/
│   │       │   └── app.blade.php                # Template utama (sidebar, navbar)
│   │       ├── dashboard.blade.php
│   │       ├── bookings/
│   │       │   ├── index.blade.php
│   │       │   └── show.blade.php
│   │       ├── courts/
│   │       │   ├── index.blade.php
│   │       │   └── form.blade.php
│   │       └── reports/
│   │           └── index.blade.php
│   ├── 📂 css/
│   │   └── app.css                              # Entry point Tailwind CSS
│   └── 📂 js/
│       └── app.js                               # Entry point JavaScript
│
├── 📂 routes/
│   └── web.php                                  # Definisi semua route aplikasi
│
├── 📂 storage/
│   └── 📂 app/public/
│       └── 📂 payments/                         # Foto bukti transfer pelanggan
│
├── 📂 public/
│   └── index.php                                # Entry point aplikasi
│
├── .env.example                                 # Template konfigurasi environment
├── composer.json                                # Dependensi PHP
├── package.json                                 # Dependensi Node.js
└── README.md                                    # Dokumentasi ini
```

---

## 🎨 Design Reference

Referensi desain UI/UX sistem ini tersedia di Figma:

[![Open in Figma](https://img.shields.io/badge/Buka%20di%20Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white)](https://www.figma.com/design/0ppDoxsrhH5Qd6VoFiWhPw/Untitled?node-id=0-1&t=Y4j3WYPlkrE6gMeW-1)

---

## 👥 Contributors

Proyek ini dikembangkan dengan penuh dedikasi oleh tim:

<div align="center">

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/shac1x">
        <img src="https://github.com/shac1x.png" width="90px" style="border-radius:50%" alt="Shac1x"/>
        <br/>
        <b>Shac1x</b>
      </a>
      <br/>
      <img src="https://img.shields.io/badge/Developer-FF6B35?style=flat-square"/>
    </td>
    <td align="center">
      <a href="https://github.com/firzaaditiya">
        <img src="https://github.com/firzaaditiya.png" width="90px" style="border-radius:50%" alt="Firza Aditiya"/>
        <br/>
        <b>Firza Aditiya</b>
      </a>
      <br/>
      <img src="https://img.shields.io/badge/Developer-FF6B35?style=flat-square"/>
    </td>
    <td align="center">
      <a href="https://github.com/manap01">
        <img src="https://github.com/manap01.png" width="90px" style="border-radius:50%" alt="Manap01"/>
        <br/>
        <b>Manap01</b>
      </a>
      <br/>
      <img src="https://img.shields.io/badge/Developer-FF6B35?style=flat-square"/>
    </td>
  </tr>
</table>

</div>

---

## 📄 Lisensi

Sistem ini dirilis sebagai perangkat lunak open-source di bawah lisensi:

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

---

<div align="center">

```
Last Updated   :  2026-03-31
Status         :  PRODUCTION READY
Version        :  1.0.0
License        :  MIT Open Source
```

<img src="https://capsule-render.vercel.app/api?type=waving&color=gradient&customColorList=6,11,20&height=120&section=footer&animation=twinkling" width="100%"/>

<sub>Dibuat dengan ❤️ oleh Tim Garuda Futsal Arena © 2026</sub>

</div>
