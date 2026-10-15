
# Aplikasi Pemesanan Kantin Kampus

## Deskripsi
Aplikasi web sederhana untuk melakukan pemesanan menu kantin kampus menggunakan PHP Native.

## Teknologi
- PHP Native
- HTML
- CSS
- Session PHP
- Cookie
- Git dan GitHub

## Fitur
- Menampilkan daftar menu kantin.
- Mencari menu berdasarkan nama.
- Memfilter menu berdasarkan kategori.
- Menambahkan menu ke keranjang.
- Menghapus pesanan.
- Mengosongkan keranjang.
- Menghitung subtotal dan diskon 10% jika subtotal minimal Rp50.000.
- Memvalidasi jumlah pesanan antara 1 sampai 10.
- Menyimpan keranjang menggunakan session.

## Struktur Folder
```text
uts-web1-25012050/
├── data/
│   └── menu.php
├── includes/
│   ├── fungsi.php
│   ├── header.php
│   └── footer.php
├── dokumentasi/
│   └── pengujian/
├── index.php
├── proses.php
├── keranjang.php
├── style.css
└── README.md
```

## Cara Menjalankan
1. Pastikan PHP sudah terpasang.
2. Buka terminal di folder proyek.
3. Jalankan perintah:

   php -S localhost:8000

4. Buka browser dan akses:

   http://localhost:8000/index.php

## Pengujian
Catat hasil pengujian sesuai hasil yang benar-benar sudah dicoba.

| No. | Pengujian | Hasil |
|---|---|---|
| 1 | Menampilkan daftar menu | Isi setelah diuji |
| 2 | Mencari menu | Isi setelah diuji |
| 3 | Menambah pesanan | Isi setelah diuji |
| 4 | Menghapus pesanan | Isi setelah diuji |
| 5 | Mengosongkan keranjang | Isi setelah diuji |
| 6 | Menguji diskon minimal Rp50.000 | Isi setelah diuji |
| 7 | Memvalidasi jumlah pesanan 1–10 | Isi setelah diuji |

## Dokumentasi
Simpan screenshot pengujian di folder `dokumentasi/pengujian/`.

## Repository
Tambahkan tautan repository GitHub proyek kamu di sini.
