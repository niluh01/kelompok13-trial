<p align="center">
  <img src="https://github.com/user-attachments/assets/8a1fce8b-f8bf-43d8-af42-5758a252bab0" alt="Logo Noctale Banner" width="100%">
</p>

# Noctale

Noctale adalah platform membaca dan menulis novel digital yang dibangun menggunakan framework Laravel. Platform ini dirancang untuk memfasilitasi interaksi antara pembaca dan penulis dalam satu ekosistem digital yang modern, interaktif, dan mudah digunakan.

---

## Fitur Utama

### 1. Pengguna Publik (Tamu)

- **Eksplorasi Novel:** Menjelajahi berbagai novel berdasarkan genre dan popularitas.
- **Membaca Novel:** Mengakses dan membaca bab-bab novel yang tersedia.
- **Profil Pengguna:** Melihat profil penulis beserta karya-karyanya.

### 2. Pembaca Terautentikasi (Pembaca)

- **Dashboard Personal:** Menampilkan ringkasan aktivitas seperti riwayat bacaan, bookmark, dan rekomendasi novel.
- **Sistem Interaksi:** Memberikan komentar, menyukai komentar pengguna lain, serta memberikan rating dan review pada novel.
- **Bookmark & Riwayat:** Menyimpan novel favorit dan memantau progres bacaan.
- **Kotak Masuk (Inbox):** Menerima notifikasi aktivitas dan pembaruan karya.
- **Pelaporan (Report):** Melaporkan novel atau komentar yang tidak sesuai.
- **Manajemen Profil:** Mengedit dan memperbarui profil pengguna secara mandiri.

### 3. Penulis

Semua fitur Pembaca, ditambah:

- **Manajemen Novel:** Membuat, mengedit, dan mengelola novel sendiri.
- **Manajemen Bab:** Menambahkan bab baru, mengatur urutan bab, serta mengunggah ilustrasi.
- **Statistik Karya:** Melihat performa novel berdasarkan views dan interaksi pembaca.

### 4. Administrator

- **Dashboard Admin:** Memantau aktivitas keseluruhan platform.
- **Manajemen Pengguna:** Mengelola akun pembaca, penulis, dan admin.
- **Manajemen Konten:** Mengelola genre, novel, dan konten utama platform.
- **Moderasi Platform:** Menindaklanjuti laporan pengguna dan menghapus konten yang melanggar aturan.
- **Manajemen Banner:** Mengatur banner promosi pada halaman utama.

---

## Teknologi yang Digunakan

- **Backend:** Laravel 12 (PHP 8.2)
- **Frontend:** Tailwind CSS, Alpine.js, Vite
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **Version Control:** Git & GitHub

---

## Dokumentasi & Panduan Tim

Bagi anggota tim **Backend** maupun **Frontend**, silakan gunakan dokumen berikut sebagai acuan selama pengembangan proyek.

### Dokumentasi Internal

- **Daftar Task & GitHub Issues**  
  Gunakan GitHub Issues untuk melihat pembagian tugas, checklist fitur, dan progress pengerjaan tim.

- **Panduan Branching & Git Flow**  
  Gunakan aturan penamaan branch dan alur pengembangan sesuai kesepakatan tim.

- **Panduan Troubleshooting Gambar / Upload Error**  
  Jika gambar hasil upload tidak muncul atau terjadi kendala storage:
  
   [Lihat Troubleshooting Guide](./webnovel/docs/troubleshooting.md)

---

###  Referensi Desain UI (Figma)

Mockup antarmuka digunakan sebagai acuan implementasi frontend.

-  [Lihat Desain Halaman Beranda (Home)](LINK_FIGMA_HOME)
-  [Lihat Desain Halaman Login](LINK_FIGMA_LOGIN)

---

## Instalasi & Menjalankan Proyek Secara Lokal

### 1. Clone Repository

```bash
git clone https://github.com/niluh01/team-prompter-novel-noctale
cd noctale
```

### 2. Install Dependencies

Pastikan **Composer** dan **Node.js** sudah terpasang.

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Kemudian sesuaikan konfigurasi database:

```env
DB_CONNECTION=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Konfigurasi Storage Publik (Wajib)

Agar file gambar hasil upload dapat diakses:

```bash
php artisan storage:link
```

Jika terjadi error:

 [Lihat Troubleshooting Guide](./webnovel/docs/troubleshooting.md)

---

### 6. Jalankan Migrasi Database

```bash
php artisan migrate
```

Jika menggunakan data dummy/seeder:

```bash
php artisan migrate --seed
```

---

### 7. Jalankan Development Server

Frontend:

```bash
npm run dev
```

Backend (terminal baru):

```bash
php artisan serve
```

---

### 8. Akses Aplikasi

Buka browser:

```bash
http://localhost:8000
```

---

## Struktur Direktori

```bash
team-prompter-novel-noctale/
├── README.md
├── webnovel/
│   ├── app/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   └── docs/
│       └── troubleshooting.md
```

---

## Tim Pengembang

Proyek **Web Novel Noctale** dikembangkan oleh **Kelompok 13 Team Prompter** sebagai bagian dari pengembangan aplikasi web novel digital berbasis Laravel.

Tim berkolaborasi dalam merancang, membangun, dan mengembangkan platform yang modern, interaktif, dan mudah digunakan bagi pembaca maupun penulis.

### Anggota Tim

| Nama | NPM | Peran |
|------|------|------|
| Bintang Maulana | 2313020011 | Frontend Developer |
| Amelia Putri Syahroza | 2313020022 | Backend Developer |
| Niluh Anggraini | 2313020043 | Project Manager |

---

## Catatan

- Pastikan branch development mengikuti aturan Git Flow tim.
- Simpan dokumentasi troubleshooting terbaru jika menemukan error baru.
- Gunakan GitHub Issues untuk koordinasi task development.

---

<p align="center">
  <b>Proyek ini dirancang untuk memberikan pengalaman membaca dan menulis karya fiksi dengan ekosistem yang terkelola dengan baik.</b>
</p>
