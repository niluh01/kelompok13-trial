# Panduan Mengatasi Gambar Upload Tidak Muncul (Error 404 / Broken Image)

Di Laravel, masalah gambar hasil upload (seperti cover novel atau banner) yang tidak muncul dan menghasilkan status *Error 404* atau broken image sering terjadi. Hal ini umumnya disebabkan karena file gambar tersimpan di tempat yang tertutup (storage/app/public), sementara web hanya bisa mengakses folder yang terbuka ke publik (public/).

Berikut adalah langkah-langkah lengkap (SOP) untuk memperbaiki masalah ini secara tuntas bagi tim Backend dan Frontend.

---

## 1. Konfigurasi Sistem (Wajib)

Langkah ini dilakukan satu kali di setiap komputer developer.

### A. Pastikan FILESYSTEM_DISK menggunakan public
Buka file .env di root proyek Anda, lalu cari dan pastikan konfigurasi disk penyimpanan mengarah ke public.
env
FILESYSTEM_DISK=public


### B. Buat Symbolic Link (Symlink)
Buka terminal/CMD, pastikan Anda berada di dalam folder proyek (noctale), lalu jalankan perintah:
bash
php artisan storage:link

*Troubleshooting Jika storage:link Gagal:*
Jika Anda melihat pesan "The link already exists" tapi gambar masih rusak (sering terjadi di sistem operasi Windows), artinya symlink Anda korup atau salah arah. Lakukan ini:
1. Buka File Explorer.
2. Masuk ke folder public di proyek Anda.
3. Cari folder bernama storage (ini sebenarnya adalah shortcut).
4. *Hapus* folder storage tersebut secara manual.
5. Jalankan kembali perintah php artisan storage:link di terminal.

---

## 2. Panduan untuk Tim Backend (BE)

Saat membuat fungsi upload (misalnya di NovelController atau BannerController), pastikan file disimpan ke disk public agar masuk ke folder yang sudah di-symlink tadi.

*Contoh Kode Controller:*
php
public function store(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = null;

    // 2. Proses simpan file
    if ($request->hasFile('cover')) {
        // .store('nama_folder', 'nama_disk')
        // Ini akan menyimpan file di: storage/app/public/covers/
        $path = $request->file('cover')->store('covers', 'public');
    }

    // 3. Simpan path ('covers/nama-file.jpg') ke database
    Novel::create([
        'title' => $request->title,
        'cover' => $path, // Simpan hanya path-nya saja
    ]);

    return redirect()->back()->with('success', 'Novel berhasil ditambahkan!');
}


---

## 3. Panduan untuk Tim Frontend (FE)

Tugas tim FE adalah memanggil gambar yang sudah tersimpan menggunakan fungsi helper dari Laravel. *Jangan* pernah memanggil URL gambar secara langsung atau hardcode nama filenya.

*Aturan Emas:* Gunakan fungsi asset('storage/...') untuk memanggil gambar.

*Contoh Kode Blade (.blade.php):*

*Cara yang SALAH (Gambar akan broken):*
html
```<img src="{{ $novel->cover }}" alt="Cover">```
<!-- Output salah: covers/contoh.jpg -->

```<img src="/storage/app/public/{{ $novel->cover }}" alt="Cover">```
<!-- Output salah: URL tidak bisa diakses publik -->


*Cara yang BENAR:*
html
<!-- Menggunakan asset() helper -->
```<img src="{{ asset('storage/' . $novel->cover) }}" alt="Cover Novel" class="w-full h-auto rounded-lg">```

<!-- Atau menggunakan fungsi Storage::url() -->
<!-- <img src="{{ \Illuminate\Support\Facades\Storage::url($novel->cover) }}" alt="Cover Novel" class="w-full h-auto rounded-lg"> -->


### Tips Tambahan untuk FE (Gambar Default):
Jika ada kemungkinan novel tidak memiliki cover (data cover bernilai null di database), buatlah pengecekan agar layout web tidak rusak:

```html
@if($novel->cover)
    <img src="{{ asset('storage/' . $novel->cover) }}" alt="Cover" class="w-full rounded-lg">
@else
    <img src="{{ asset('images/default-cover.jpg') }}" alt="Default Cover" class="w-full rounded-lg">
@endif```

(Pastikan file default-cover.jpg sudah disiapkan secara manual di folder public/images/)
