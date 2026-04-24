# NovelKu
Platform berbasis web untuk membaca dan menulis novel secara online.

---

## Deskripsi
NovelKu adalah aplikasi web yang memungkinkan pengguna untuk membaca dan menulis novel secara online. Platform ini menyediakan fitur untuk pembaca, penulis, dan administrator dalam satu sistem terintegrasi.

---

## Fitur Utama

### Sisi Pembaca
- Eksplorasi daftar novel
- Pencarian berdasarkan genre
- Membaca novel per bab
- Memberikan komentar

### Sisi Penulis
- Dashboard khusus penulis
- Manajemen novel (Create, Read, Update, Delete)
- Editor untuk menulis dan mengelola bab

### Sisi Admin
- Manajemen pengguna
- Moderasi laporan pelanggaran
- Manajemen kategori genre

### Sistem Autentikasi
- Login dan Register
- Manajemen profil pengguna
- Upload avatar

---

## Tech Stack

- Framework: Laravel 12
- Bahasa: PHP 8.x  
- Database: MySQL
- Frontend: Blade Templating, Tailwind CSS (Laravel Breeze + Vite)  
- Icon/Gambar: FontAwesome / Heroicons  

---

## Instalasi (Local Development)

Ikuti langkah berikut untuk menjalankan proyek di komputer Anda:

### 1. Clone Repository
```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo
```

### 2. Install Dependency Backend
```bash
composer install
```

### 3. Install Dependency Frontend
```bash
npm install
npm run dev
```

### 4. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` sesuai konfigurasi database:
```env
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrasi Database
```bash
php artisan migrate
```

### 6. Jalankan Server
```bash
php artisan serve
```

Akses aplikasi melalui:
http://127.0.0.1:8000

---

## Struktur Branching

- main: branch stabil untuk production  
- feature/be-*: pengembangan fitur backend  
- feature/fe-*: pengembangan fitur frontend  
- *-admin: fitur khusus administrator  

---

## Struktur Direktori

app/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Middleware/

resources/
├── views/
├── css/
└── js/

routes/
├── web.php
└── auth.php

database/
├── migrations/
└── seeders/

---

## Kontributor

- Nama Anda - https://github.com/username  
- Anggota Kelompok 13 - https://github.com/username  

---

## Catatan

- Pastikan Node.js dan Composer sudah terinstall
- Gunakan PHP versi 8.x
- Disarankan menggunakan MySQL versi terbaru
